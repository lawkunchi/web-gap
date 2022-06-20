<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Http\Resources\TeamMemberResource;
use Illuminate\Support\Facades\Validator;
use Storage;
class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members = TeamMember::all();

        return response([ 'data' => 
        TeamMemberResource::collection($members), 
        'message' => 'Successful'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:50',
            'profile' => 'required|max:2048|mimes:png,jpg',
            'title' => 'required|max:100',
            'description' => 'required|max:1000'
        ]);

        $uploadedFile = $request->file('profile');
        $filename = time().$uploadedFile->getClientOriginalName();
        
        $path = Storage::putFile('memebers', $uploadedFile);

        $data['profile'] = $path;

        if($validator->fails()){
            return response(['error' => $validator->errors(), 
            'Validation Error']);
        }

        $teamMember = TeamMember::create($data);

        return response([ 'data' => new 
        TeamMemberResource($teamMember), 
        'message' => 'Success'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function show(TeamMember $teamMember)
    {
        //
        return response([ 'data' => new 
        TeamMemberResource($teamMember), 'message' => 'Success'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamMember $teamMember)
    {
        //

        $teamMember->update($request->all());

        return response([ 'data' => new 
        TeamMemberResource($teamMember), 'message' => 'Success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamMember $teamMember)
    {
        //

        $teamMember->delete();

        return response(['message' => 'Team Member deleted']);
    }
}
