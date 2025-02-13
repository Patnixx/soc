<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            $cars = Car::with('images')->get();
            $user = Auth::user();
            $unread = $this->checkMails();
            return view('cars.index', compact('cars', 'user', 'unread'));
        }
        $cars = Car::with('images')->get();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        $user = Auth::user();
        $unread = $this->checkMails();
        if($user->role == 'Admin' || $user->role == 'Teacher')
        {
            return view('cars.create', compact('user', 'unread'));
        }
        return redirect()->route('cars.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'horsepower' => 'required|string|max:255',
            'cubage' => 'required|string|max:255',
            'gearbox' => 'required|string|max:255',
            'drive' => 'required|string|max:255',
            'mileage' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $car = Car::create($request->all());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $imageName = time() . '_' . $imageFile->getClientOriginalName();
                
                //$imageFile->storeAs('public/car_images', $imageName);
                $imagePath = public_path('assets/car_images');
                $imageFile->move(''.$imagePath.'', $imageName);
                CarImage::create([
                    'car_id' => $car->id,
                    'image_name' => $imageName
                ]);
            }
        }

        return redirect()->route('cars.index')->with('success', 'Car created successfully!');
    }

    public function edit(Car $car)
    {
        if(Auth::check()) {
            $user = Auth::user();
            $unread = $this->checkMails();
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                return view('cars.edit', compact('car', 'user', 'unread'));
            }
            return redirect()->route('cars.index');
        }
        return redirect()->route('cars.index');
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'horsepower' => 'required|string|max:255',
            'cubage' => 'required|string|max:255',
            'gearbox' => 'required|string|max:255',
            'drive' => 'required|string|max:255',
            'mileage' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $car->update($request->all());
        foreach ($car->images as $image) {
            $imagePath = public_path('assets/car_images');
            File::delete($imagePath . '/' . $image->image_name);
            $image->delete();
        }
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $imageName = time() . '_' . $imageFile->getClientOriginalName();
                //$imageFile->storeAs('public/car_images', $imageName);
                $imagePath = public_path('assets/car_images');
                $imageFile->move(''.$imagePath.'', $imageName);
                CarImage::create([
                    'car_id' => $car->id,
                    'image_name' => $imageName
                ]);
            }
        }

        return redirect()->route('cars.index')->with('success', 'Car updated successfully!');
    }
     
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        foreach ($car->images as $image) {
            $imagePath = 'public/car_images/' . $image->image_name;
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }

            $image->delete();
        }

        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car and images deleted successfully!');
    }
}

