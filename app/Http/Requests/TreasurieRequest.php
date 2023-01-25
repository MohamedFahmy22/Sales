<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TreasurieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'is_master' => 'required',
            'last_receipt_number_exchange' => 'required|integer|min:0',
            'last_receipt_number_collection' => 'required|integer|min:0',
            'active' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'إسم الخزنة مطلوب',
            'is_master.required' => 'نوع الخزنة مطلوب',
            'last_receipt_number_exchange.required' => 'أخر رقم إيصال صرف نقدية لهذه الخزنة مطلوب',
            'last_receipt_number_exchange.integer' => 'أخر رقم إيصال صرف نقدية لهذه الخزنة يجب ان يكون رقم صحيح',
            'last_receipt_number_exchange.min:0' => 'أخر رقم إيصال صرف نقدية لهذه الخزنة يجب الا يكون اقل من الصفر',
            'last_receipt_number_collection.required' => 'أخر رقم إيصال تحصيل نقدية لهذه الخزنة مطلوب',
            'last_receipt_number_collection.integer' => 'أخر رقم إيصال تحصيل نقدية لهذه الخزنة يجب ان يكون رقم صحيح',
            'last_receipt_number_collection.min:0' => 'أخر رقم إيصال تحصيل نقدية لهذه الخزنة يجب الا يكون اقل من الصفر',
            'active.required' => 'حالة التفعيل مطلوب',
        ];
    }


}
