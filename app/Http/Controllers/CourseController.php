<?php
namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use JWTAuth;

class CourseController extends Controller
{
    public function postCourse(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();
        $course = new Course();
        $course->content = $request->input('content');
        $course->name = $request->input('name');
        $course->text = $request->input('text');
        $course->save();
        return response()->json(['course' => $course, 'user' => $user], 201);
    }


    public function getCourses()
    {
        $courses= Course::all();
        $response = [
          'courses' => $courses
        ];
        return response()->json($response, 200);
    }

    public function putCourse(Request $request, $id)
    {
        $course = Course::find($id);
        if (!$course) {
            return response()->json(['message' => 'Document not found'], 404);
        }
        $course->content = $request->input('content');
        $course->name = $request->input('name');
        $course->text = $request->input('text');
        $course->save();
        return response()->json(['course' => $course], 200);
    }

    public function deleteCourse($id)
    {
        $course = Course::find($id);
        $course->delete();
        return response()->json(['message' => 'Course deleted'], 200);
    }
}