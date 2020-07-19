<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Session;
class TeamRequest extends FormRequest
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
     * @return array
     */
    public function rules(Request $request)
    {
           switch($this->method())
            {

                case 'GET':
                case 'DELETE':
                {
                    return [];
                }
                case 'POST':
                {
                    return [
                         'name' => 'required|min:5|unique:team,name,NULL,id',
                         'short_name' => 'required|min:5|unique:team,name,NULL,id',
                         'image' => 'mimes:jpeg,bmp,png',
                    ];
                }
                case 'PUT':
                case 'PATCH':
                {
                    return [       
                         'name' => 'required|min:5|unique:team,name,'.$request->segment(3).',id',
                         'short_name' => 'required|min:5|unique:team,slug,'.$request->segment(3).',id',
                         'image' => 'mimes:jpeg,bmp,png',
                         ];
                }
                default:break;
            }
          
    }
}
