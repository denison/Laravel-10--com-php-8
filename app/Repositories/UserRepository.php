<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version July 30, 2020, 11:24 am -03
 */
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'holding_id',
        'name',
        'surname',
        'email',
        'password',
        'facebook_password',
        'google_password',
        'apple_password',
        'document',
        'phone',
        'latitude_address',
        'longitude_address',
        'address',
        'neighborhood',
        'number',
        'city',
        'state',
        'complement',
        'reference',
        'zipcode',
        'latitude',
        'longitude',
        'accepted_mails',
        'accepted_sms',
        'accepted_whatsapp',
        'accepted_pushs',
        'gender',
        'birth_date',
        'is_active',
        'is_verified',
        'photo',
        'document_photo',
        'selfie_photo',
        'uuid'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    public function prepareInputs(Request $request, $except = [])
    {
        $input = $request->except($except);

        if (!isset($input['password'])) $input['keep_password'] = true;
        if ($request->phone) 
        {
            if (!\Functions::isCellPhone($request->phone)) throw ValidationException::withMessages(['phone' => \Lang::get("flash.is_not_cell_phone")]);
            else $input['phone'] = \Functions::normalizePhone($request->phone);
        }

        $input['is_active'] = true;
        $input['role_name'] = config('enums.roles.CLIENT.name');
        $input['holding_id'] = ($request->header('X-Holding-Id')) ? ((int) $request->header('X-Holding-Id')) : null;
        $input['uuid'] = uniqid();
     
        if (($user_validation = Validator::make($input, User::$rules))->fails()) throw new \Dingo\Api\Exception\StoreResourceFailedException('Ocorreu um erro ao validar os dados! Por favor, verifique-os.', $user_validation->errors());
        else if ($request->password) 
        {
            $input['password'] = bcrypt($request->password);
            
            switch ($request->type_register) 
            {
                case 'facebook': $input['facebook_password'] = hash('sha256', $request->facebook_password);
                break;

                case 'google': $input['google_password'] = hash('sha256', $request->google_password);
                break;

                case 'apple': $input['apple_password'] = hash('sha256', $request->apple_password);
                break;
            }
        }

        return $input;
    }

    public function findValidUserByInput(array $input, $validate_by_user_id = null)
    {
        $user_found = null;

        if (isset($input['phone']))
        {
            $user_found = User::where('phone', $input['phone'])->whereNotNull('phone')->first();
            if ($user_found) 
            {
                if 
                (
                    (!$validate_by_user_id && !$user_found->is_pre_registered)
                    ||
                    ($validate_by_user_id && $user_found->id != $validate_by_user_id)
                ) throw ValidationException::withMessages(['phone' => \Lang::get("flash.phone_registered")]);
            }
        }

        if (!$user_found && isset($input['email']))
        {
            $user_found = User::where('email', $input['email'])->whereNotNull('email')->first();
            if ($user_found) 
            {
                if 
                (
                    (!$validate_by_user_id && !$user_found->is_pre_registered)
                    ||
                    ($validate_by_user_id && $user_found->id != $validate_by_user_id)
                ) throw ValidationException::withMessages(['email' => \Lang::get("flash.email_registered")]);
            }
        }
        
        if (!$user_found && isset($input['document']))
        {
            $user_found = User::where('document', $input['document'])->whereNotNull('document')->first();
            if ($user_found) 
            {
                if 
                (
                    (!$validate_by_user_id && !$user_found->is_pre_registered)
                    ||
                    ($validate_by_user_id && $user_found->id != $validate_by_user_id)
                ) throw ValidationException::withMessages(['document' => \Lang::get("flash.document_registered")]);
            }
        }
        
        return $user_found;
    }
}