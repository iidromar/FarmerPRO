<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class farmer extends Controller
{
    public function dashboard(){

        $farmer = DB::table('farmers')->where('id', 1)->get()->first();
        $route = Route::getFacadeRoot()->current()->uri();
        $highest_age = DB::table('farmers')->orderBy('age', 'desc')->first()->age;
        $lowest_age = DB::table('farmers')->orderBy('age', 'asc')->first()->age;
        $total_farmers = DB::table('farmers')->count();
        $total_ages = 0;
        $total_family_members = 0;
        $av_experience = 0;
        $farmers = DB::table('farmers')->get();
        foreach ($farmers as $farmer){
            $total_ages = $total_ages + $farmer->age;
            $total_family_members = $total_family_members + $farmer->total_family;
            $av_experience = $av_experience + $farmer->experience_years;
        }
        $av_age = $total_ages/$total_farmers;
        $av_family = $total_family_members/$total_farmers;
        $av_experience = $av_experience/$total_farmers;

//        livestock

        $total_lambs = 0;
        $total_ewes_milking = 0;
        $total_ewes_pregnant =0;
        $total_ewes_dry_not_pregnant =0;
        $total_stallions_rams =0;
        $av_frmilk = 0;
        $av_butter = 0;
        $av_ghee = 0;
        $av_beans = 0;
        $av_yogurt = 0;
        $total_goat_milking = 0;
        $total_goat_pregnant = 0;
        $total_goat_dry_not_pregnant =0;
        $total_goat_zero_three = 0;
        $total_goat_three_six = 0;
        $total_goat_more_six =0;
        $total_goat_staillions_teos =0;
        foreach ($farmers as $farmer) {
            $total_lambs = $total_lambs + $farmer->total_lamb;
            $total_ewes_milking = $total_ewes_milking + $farmer->ewes_milking;
            $total_ewes_pregnant = $total_ewes_pregnant + $farmer->ewes_pregnant;
            $total_ewes_dry_not_pregnant = $total_ewes_dry_not_pregnant + $farmer->ewes_dry_not_pregnant;
            $total_stallions_rams = $total_stallions_rams + $farmer->stallions_rams;
            $av_frmilk = $av_frmilk +$farmer->fresh_milk_price;
            $av_butter = $av_butter + $farmer->butter_price;
            $av_ghee = $av_ghee + $farmer->ghee_price;
            $av_beans = $av_beans + $farmer->beans_price;
            $av_yogurt = $av_yogurt + $farmer->yogurt;
            $total_goat_milking = $total_goat_milking + $farmer->goat_milking;
            $total_goat_pregnant = $total_goat_pregnant + $farmer->goat_pregnant;
            $total_goat_dry_not_pregnant = $total_goat_dry_not_pregnant + $farmer->goat_pregnant;
            $total_goat_zero_three = $total_goat_zero_three + $farmer->goat_zero_three;
            $total_goat_three_six = $total_goat_three_six + $farmer->goat_three_six;
            $total_goat_more_six = $total_goat_more_six + $farmer->goat_more_six;
            $total_goat_staillions_teos = $total_goat_staillions_teos + $farmer->staillions_teos;
        }
        $av_frmilk = $av_frmilk/$total_farmers;
        $av_butter = $av_butter/$total_farmers;
        $av_ghee = $av_ghee/$total_farmers;
        $av_beans = $av_beans/$total_farmers;
        $av_yogurt = $av_yogurt/$total_farmers;
            return view('dashboard', compact('farmer', 'total_farmers', 'av_beans', 'av_butter', 'av_frmilk', 'av_ghee',
                'total_goat_milking','total_goat_pregnant','total_goat_dry_not_pregnant', 'total_goat_zero_three',
                'total_goat_three_six', 'total_goat_more_six', 'total_goat_staillions_teos',
                'av_yogurt', 'av_age', 'highest_age', 'lowest_age', 'av_family', 'av_experience', 'route', 'total_lambs', 'total_ewes_dry_not_pregnant', 'total_ewes_milking', 'total_ewes_pregnant', 'total_stallions_rams'));
    }

    public function farmers_table(){
        $farmers = DB::table('farmers')->get();
        $route = Route::getFacadeRoot()->current()->uri();
        return view('farmers_table', compact('farmers', 'route'));
    }

    public function farmer_page($id){
        $farmer = DB::table('farmers')->where('id', $id)->get()->first();
        $route = Route::getFacadeRoot()->current()->uri();

        $highest_age = DB::table('farmers')->orderBy('age', 'desc')->first()->age;
        $lowest_age = DB::table('farmers')->orderBy('age', 'asc')->first()->age;
        $total_farmers = DB::table('farmers')->count();
        $total_ages = 0;
        $total_family_members = 0;
        $av_experience = 0;
        $farmers = DB::table('farmers')->get();
        foreach ($farmers as $farmer){
            $total_ages = $total_ages + $farmer->age;
            $total_family_members = $total_family_members + $farmer->total_family;
            $av_experience = $av_experience + $farmer->experience_years;
        }
        $av_age = $total_ages/$total_farmers;
        $av_family = $total_family_members/$total_farmers;
        $av_experience = $av_experience/$total_farmers;

//        livestock

        $total_lambs = 0;
        $total_ewes_milking = 0;
        $total_ewes_pregnant =0;
        $total_ewes_dry_not_pregnant =0;
        $total_stallions_rams =0;
        $av_frmilk = 0;
        $av_butter = 0;
        $av_ghee = 0;
        $av_beans = 0;
        $av_yogurt = 0;
        $total_goat_milking = 0;
        $total_goat_pregnant = 0;
        $total_goat_dry_not_pregnant =0;
        $total_goat_zero_three = 0;
        $total_goat_three_six = 0;
        $total_goat_more_six =0;
        $total_goat_staillions_teos =0;
        foreach ($farmers as $farmer) {
            $total_lambs = $total_lambs + $farmer->total_lamb;
            $total_ewes_milking = $total_ewes_milking + $farmer->ewes_milking;
            $total_ewes_pregnant = $total_ewes_pregnant + $farmer->ewes_pregnant;
            $total_ewes_dry_not_pregnant = $total_ewes_dry_not_pregnant + $farmer->ewes_dry_not_pregnant;
            $total_stallions_rams = $total_stallions_rams + $farmer->stallions_rams;
            $av_frmilk = $av_frmilk +$farmer->fresh_milk_price;
            $av_butter = $av_butter + $farmer->butter_price;
            $av_ghee = $av_ghee + $farmer->ghee_price;
            $av_beans = $av_beans + $farmer->beans_price;
            $av_yogurt = $av_yogurt + $farmer->yogurt;
            $total_goat_milking = $total_goat_milking + $farmer->goat_milking;
            $total_goat_pregnant = $total_goat_pregnant + $farmer->goat_pregnant;
            $total_goat_dry_not_pregnant = $total_goat_dry_not_pregnant + $farmer->goat_pregnant;
            $total_goat_zero_three = $total_goat_zero_three + $farmer->goat_zero_three;
            $total_goat_three_six = $total_goat_three_six + $farmer->goat_three_six;
            $total_goat_more_six = $total_goat_more_six + $farmer->goat_more_six;
            $total_goat_staillions_teos = $total_goat_staillions_teos + $farmer->staillions_teos;
        }
        $av_frmilk = $av_frmilk/$total_farmers;
        $av_butter = $av_butter/$total_farmers;
        $av_ghee = $av_ghee/$total_farmers;
        $av_beans = $av_beans/$total_farmers;
        $av_yogurt = $av_yogurt/$total_farmers;
        return view('farmer_page', compact('farmer', 'total_farmers', 'av_beans', 'av_butter', 'av_frmilk', 'av_ghee',
            'total_goat_milking','total_goat_pregnant','total_goat_dry_not_pregnant', 'total_goat_zero_three',
            'total_goat_three_six', 'total_goat_more_six', 'total_goat_staillions_teos',
            'av_yogurt', 'av_age', 'highest_age', 'lowest_age', 'av_family', 'av_experience', 'route', 'total_lambs', 'total_ewes_dry_not_pregnant', 'total_ewes_milking', 'total_ewes_pregnant', 'total_stallions_rams'));
    }
    public function farmer_sending(Request $request){
        $farmer_id = $request->farmer_switcher;
        return redirect()->route('farmer_page', ['id' => $farmer_id]);
    }

}
