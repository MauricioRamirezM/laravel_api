<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    /*
    HERE IN THIS CALSS WE CAN VALIDATE OURS INPUTS IN THE RULES() METHOD, ALSO WE CAN DEFINE/CUSTOMIZE OUR MESSAGES TO TELL TO OUR USER WITCH INPUT IS WRONG IN THE MESSAGES() METHOD
      
     */

    //HERE WE RETURN AN ARRAY WITH THE NAME OF THE FIEL AS KEY AND AS VALUE WE PASS THE PARAMETERS MUST CONTAIN
    public function rules(): array
    {
        //HERE THE TITKE IS REQUIRED, MUST BE STRING AND MINIMUM 2 CHARS
        //ALSO TH EBODY IS REQUIRED, STRING AND MINIMUM 10 CAHRS
        return [
            'title' => 'required|string|min:2',
            'body' => ['required', 'string', 'min:10'],
            /*IF WE ALLOW TO THE USER SEND AN ARRAY TO OUR DB, WE MAKE IT LIKE THIS:
            -first we define that "tags" gonna be an array 
            - then we say; all the elements in the array tags (tags.*) muts be string and at least 3 chars
            */
            'tags'=> 'array',
            'tags.*'=> 'string|min:3',

        ];
    }

    //IN THIS METHOD WE DUSTOMIZE OUR MESSAGES FOR OOUR USER, USING THE DOT NOTATION "title.requires" WE CAN DEFINE A DIFFERENT MESSAGE FOR EVERY "RULE"
    public function messages(){
        //  HERE WHEN THE USER DOE SNOT SEND THE TITLE FILLED GONNA THROW THE FIRST MESSAGE
        //IF THEY WRITE A INT INSTEAD OF A STRING GONNA BE THE SECOI\ND ONE
        //AND IF THEY SEND LESS THAN THE :min (IN OUR CASE IS 2 CHARS) GONNA RETURN THE THIRD MESSAGE
        return [
            'title.required' => 'the title is required',
            'title.string' => 'The title must be a valid string',
            'title.min' => 'The title must be at least :min char',
            //HERE WE ARE RETURNING THE MESSAGE TO TH EUISER FOR THE ARRAY
            'tags.*' => 'All the tags must be a valid string and at leats :min chars'
        ];
    }
}
