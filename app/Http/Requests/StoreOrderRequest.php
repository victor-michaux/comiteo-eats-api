<?php

namespace App\Http\Requests;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'delivery_method' => ['string', Rule::in(Order::DELIVERY_METHODS)],
            'delivery_street_address' => 'required|string',
            'delivery_zip_code' => 'required|string',
            'delivery_city' => 'required|string',
            'items' => 'required|array',
            'items.*.id' => 'required|distinct|exists:dishes',
            'items.*.quantity' => 'required|integer|min:1',
        ];
    }
}
