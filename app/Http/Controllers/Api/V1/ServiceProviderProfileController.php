<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\ServiceProviderProfileRepository;
use App\Data\Models\User;
use App\Data\Models\ServiceProviderProfile;

class ServiceProviderProfileController extends ApiResourceController
{
    public $_repository;

    public function __construct(ServiceProviderProfileRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function rules($value='')
    {
        $rules = [];

        if($value == 'index'){
            $rules['pagination'] =  'nullable|boolean';
            $rules['keyword']    = 'nullable|string';
            $rules['filter_by_business_type'] = 'nullable|in:business,individual';
            $rules['from_explore'] = 'nullable|boolean';
        }

        return $rules;

    }


    public function input($value='')
    {
        $input = request()->only(
            'id', 'pagination', 'keyword',
            'filter_by_business_type', 'filter_by_service',
            'user_rating', 'zip', 'filter_by_featured', 'is_approved', 'user_detail', 'is_verified',
            'filter_by_top_providers','from_explore'
        );

        if (request()->user()) {
            $input['user_id'] = request()->user()->id;
        }

        if($value != 'update'){
            unset($input['is_verified']);
        }

        if($value == 'update'){
            unset($input['user_id']);
        }


        return $input;
    }

    public function delete($id){
        return response()->json([
            'message' => 'Something went wrong'
        ]);

    //     $ServiceProvider = ServiceProviderProfile::findOrFail($id);
    //     $user_id = $ServiceProvider->user_id;
    //     $user = User::findOrFail($user_id);
    //     $ServiceProvider->delete();
    //    //  // $user->delete();
    //     return response()->json([
    //      'message' => 'User deleted successfully'
    //     ]);
    }

}
