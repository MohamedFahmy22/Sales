<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TreasurieRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Treasurie;
use PHPUnit\Exception;
use function PHPUnit\Framework\isFalse;


class TreasurieController extends Controller
{
    public function index()
    {
        $data = Treasurie::select()->orderby('id', 'DESC')->paginate(PAGINATE_COUNT);
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->added_by_admin = Admin::where('id', $info->added_by)->value('name');   // name اللي موجود في جدول ال admin
                // $info->added_by جايه من جدول ال Treasurie
                if ($info->updated_by > 0 && $info->updated_by != null) {
                    $info->updated_by_admin = Admin::where('id', $info->updated_by)->value('name'); // name اللي موجود في جدول ال admin
                    // $info->updated_by جايه من جدول ال Treasurie
                }
            }
        }
        return view('admin.treasurie.index', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.treasurie.create');
    }

    public function store(TreasurieRequest $request)
    {
        try {
            $company_code = auth()->user()->company_code;
            // check if the treasurie name is exists or not
            // هتشك لو الاسم اللي داخل معايا من الريكويست متكرر عندي في الداتا بيز ولا لا
            $checkExists = Treasurie::where(['name' => $request->name, 'company_code' => $company_code])->first();
            // if name of the treasurie not exist in the $checkExists
            // لو الاسم مش متكرر
            if ($checkExists == null) {
                // check if we have in the reques if the treasurie is master
                // هنتشك لو الخزنه اللي جايه من الريكوست انها رئيسيه او لا
                if ($request->is_master == 1) {
                    // هنا هنتشك نشوف في عندي خزن رئيسية ولا لا  وهجيبهم بالكويري دي وهشوف متكرريين ولا لا
                    // هخش اشوف في الجدول فيم مسجلة ماستر قيمتها 1 ونفس كود الشركة ولا لا
                    $checkExistsIsMaster = Treasurie::where(['is_master' => 1, 'company_code' => $company_code])->first();
                    // لو فعلا الخزنه الماستر مش موجوده
                    if ($checkExistsIsMaster) {
                        // لو فعلا الخزنه الماستر موجوده مينفعشي يبقي عندي الا واحده فهرجع تاني ع الفيو بتاع الإضافة
                        return redirect()->back()
                            ->with(['error' => 'عفوا هناك خزنة رئيسية بالفعل مسجلة من قبل لايمكن ان يكون هناك اكثر من خزنة رئيسية'])
                            ->withInput();
                    }
                }
                // هعمل array of $data
                $data['name'] = $request->name;
                $data['is_master'] = $request->is_master;
                $data['last_receipt_number_exchange'] = $request->last_receipt_number_exchange;
                $data['last_receipt_number_collection'] = $request->last_receipt_number_collection;
                $data['active'] = $request->active;
                $data['created_at'] = date("Y-m-d H:i:s");
                $data['added_by'] = auth()->user()->id;
                $data['company_code'] = $company_code;
                $data['date'] = date("Y-m-d");
                Treasurie::create($data);
                return redirect()->route('admin.treasuries.index')->with(['success' => ' لقد تم إضافه البيانات بنجاح']);
            } else {
                // redirect if the name is exists
                //لو الاسم متكرر هعمل رديركت ع الفورم
                return redirect()->back()
                    ->with(['error' => 'عفوا اسم الخزنة مسجل من قبل'])
                    ->withInput();
            }
        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $data = Treasurie::select()->find($id);
        return view('admin.treasurie.edit', ['data' => $data]);

    }

    public function update(TreasurieRequest $request, $id)
    {
        try {
            $company_code = auth()->user()->company_code;
            $data = Treasurie::find($id);
            if (!$data) {
                return redirect()->route('admin.treasuries.index')->with(['error' => 'عفوا غير قادر علي الوصول الي البيانات المطلوبة !!']);
            } else {
                // عمل check لو الخزنه موجوده قبل كده في الداتا بيز عن طريق كود الشركه والاسم واحتمال يكونو متكررين بس ال id مش هيكون متكرر سهل أعرف متكرر ولا لا عن طريق حتي لو القيم بتاع كود الشركه واسمها لو متوافقين زي بعض ف انا هجيب ال id اللي مش بيساوي ال id اللي معايا
                $check_exists = Treasurie::where(['name' => $request->name, 'company_code' => $company_code])->where('id', '!=', $id)->first();
                if ($check_exists) {
                    return redirect()->back()
                        ->with(['error' => 'عفوا اسم الخزنة مسجل من قبل'])
                        ->withInput();
                }
                if ($request->is_master == 1) {
                    $is_master = Treasurie::where(['company_code' => $company_code, 'is_master' => 1])->first();
                    if ($is_master) {
                        return redirect()->back()
                            ->with(['error' => 'عفوا هناك خزنة رئيسية بالفعل مسجلة من قبل لايمكن ان يكون هناك اكثر من خزنة رئيسية'])
                            ->withInput();
                    }
                }
            }
        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }

    }


}
