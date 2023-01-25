<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminPanelSetting;
use App\Http\Requests\AdminPanelSettingRequest;
use Illuminate\Http\Request;

class AdminPanelSettingController extends Controller
{
    public function index()
    {
        $data = AdminPanelSetting::where('company_code', auth()->user()->company_code)->first();
        if (!empty($data)) {
            if ($data['updated_by'] > 0 && $data['updated_by'] != null) {
                $data['updated_by_admin'] = Admin::where('id', $data['updated_by'])->value('name');
            }

        }
        return view('admin.adminPanelSetting.index', ['data' => $data]);
    }

    public function edit()
    {
        $data = AdminPanelSetting::where('company_code', auth()->user()->company_code)->first();
        return view('admin.adminPanelSetting.edit', ['data' => $data]);
    }

    public function update(AdminPanelSettingRequest $request)
    {
        try {
            $adminPanelSetting = AdminPanelSetting::where('company_code', auth()->user()->company_code)->first();
            $adminPanelSetting->system_name = $request->system_name;
            $adminPanelSetting->address = $request->address;
            $adminPanelSetting->phone = $request->phone;
            $adminPanelSetting->generl_alert = $request->generl_alert;
            $adminPanelSetting->updated_by = auth()->user()->id;
            $adminPanelSetting->updated_at = date("Y-m-d H:i:s");
            $oldphotoPath = $adminPanelSetting->photo;

            if ($request->has('photo')) {
                $request->validate([
                    'photo' => 'required|mimes:png,jpg,jpeg|max:2000'
                ]);

                $file_path = saveImage('public/assets/admin/uploads', $request->photo);

                $adminPanelSetting->photo = $file_path;

                if (file_exists('public/assets/admin/uploads/' . $oldphotoPath) && (!empty($oldphotoPath))) {
                    unlink('public/assets/admin/uploads/' . $oldphotoPath);
                }
            }
            $adminPanelSetting->save();

            return redirect()->route('admin.panelSetting.index')->with(['success' => 'تم تحديث البينات بنجاح ']);


        } catch (\Exception $e) {
            return redirect()->route('admin.panelSetting.index')->with(['error' => '.. عفواً حدث خطأ ما ' . $e->getMessage()]);
        }
    }

}
