<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sars;
use Spatie\SimpleExcel\SimpleExcelReader;
use DataTables;

class SarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sarsData = Sars::all();
     if ($request->ajax()) {
        
        return Datables::of($sarsData)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
     }
        return view('sars.dataTable')->with('sarsData', $sarsData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         return view('sars.editSars')->with('sarsData', Sars::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'sample_from_year'                      => 'required|string',
            'sample_from_month'                     => 'required|string',
            'sample_from_day'                       => 'required|string',
            'gene1'                                 => 'nullable|string',
            'gene2'                                 => 'nullable|string',
            'ct'                                    => 'nullable|string',
            'station_name'                          => 'required|string',
            'population_served'                     => 'required|string',
            'people_positive'                       => 'required|string',
            'name_of_country'                       => 'required|string',
            'type_of_data'                          => 'required|string',
            'data_provider'                         => 'required|string',
            'contact_person'                        => 'required|string',
            'address_of_contact'                    => 'required|string',
            'email'                                 => 'required|string',
            'laboratory'                            => 'required|string',
            'name_of_city'                          => 'required|string',
            'national_code'                         => 'required|string',
            'relevant_ec_code_wise'                 => 'required|string',
            'relevant_ec_code_other'                => 'required|string',
            'other_code'                            => 'required|string',
            'latitude'                              => 'required|string',
            'latitude_d'                            => 'required|string',
            'latitude_m'                            => 'required|string',
            'latitude_s'                            => 'required|string',
            'latitude_decimal'                      => 'required|string',
            'longitude'                             => 'required|string',
            'longitude_d'                           => 'required|string',
            'longitude_m'                           => 'required|string',
            'longitude_s'                           => 'required|string',
            'longitude_decimal'                     => 'required|string',
            'altitude'                              => 'required|string',
            'design_capacity'                       => 'required|string',
            'catchment_size'                        => 'required|string',
            'gdp'                                   => 'required|string',
            'people_recovered'                      => 'required|string',
            'people_positive_past'                  => 'required|string',
            'people_recovered_past'                 => 'required|string',
            'sample_matrix'                         => 'required|string',
            'sample_from_hour'                      => 'required|string',
            'sample_to_hour'                        => 'required|string',
            'sample_to_day'                         => 'required|string',
            'sample_to_month'                       => 'required|string',
            'sample_to_year'                        => 'required|string',
            'type_of_sample'                        => 'required|string',
            'type_of_composite_sample'              => 'required|string',
            'sample_interval'                       => 'required|string',
            'flow_total'                            => 'required|string',
            'flow_minimum'                          => 'required|string',
            'flow_maximum'                          => 'required|string',
            'temperature'                           => 'required|string',
            'cod'                                   => 'required|string',
            'total_n_nh4_n'                         => 'required|string',
            'tss'                                   => 'required|string',
            'dry_weather_conditions'                => 'required|string',
            'last_rain_event'                       => 'required|string',
            'associated_phenotype'                  => 'required|string',
            'genetic_marker'                        => 'required|string',
            'date_of_sample_preparation'            => 'required|string',
            'storage_of_sample'                     => 'required|string',
            'volume_of_sample'                      => 'required|string',
            'internal_standard_used1'               => 'required|string',
            'method_used_for_sample_preparation'    => 'required|string',
            'date_of_rna_extraction'                => 'required|string',
            'method_used_for_rna_extraction'        => 'required|string',
            'internal_standard_used2'               => 'required|string',
            'rna1'                                  => 'required|string',
            'rna2'                                  => 'required|string',
            'replicates1'                           => 'required|string',
            'analytical_method_type'                => 'required|string',
            'analytical_method_type_other'          => 'required|string',
            'date_of_analysis'                      => 'required|string',
            'lod1'                                  => 'required|string',
            'lod2'                                  => 'required|string',
            'loq1'                                  => 'required|string',
            'loq2'                                  => 'required|string',
            'uncertainty_of_the_quantification'     => 'required|string',
            'efficiency'                            => 'required|string',
            'rna3'                                  => 'required|string',
            'pos_control_used'                      => 'required|string',
            'replicates2'                           => 'required|string',
            'comment'                               => 'required|string',
        ];
      
       // dd($request);
        $validated = $request->validate($rules);
        
        $d = Sars::find($id);
        $d->sample_from_year                      = $request->sample_from_year;
        $d->sample_from_month                     = $request->sample_from_month;
        $d->sample_from_day                       = $request->sample_from_day;
        $d->gene1                                 = $request->gene1;
        $d->gene2                                 = $request->gene2;
        $d->ct                                    = $request->ct;
        $d->station_name                          = $request->station_name;
        $d->population_served                     = $request->population_served;
        $d->people_positive                       = $request->people_positive;
        $d->name_of_country                       = $request->name_of_country;
        $d->type_of_data                          = $request->type_of_data;
        $d->data_provider                         = $request->data_provider;
        $d->contact_person                        = $request->contact_person;
        $d->address_of_contact                    = $request->address_of_contact;
        $d->email                                 = $request->email;
        $d->laboratory                            = $request->laboratory;
        $d->name_of_city                          = $request->name_of_city;
        $d->national_code                         = $request->national_code;
        $d->relevant_ec_code_wise                 = $request->relevant_ec_code_wise;
        $d->relevant_ec_code_other                = $request->relevant_ec_code_other;
        $d->other_code                            = $request->other_code;
        $d->latitude                              = $request->latitude;
        $d->latitude_d                            = $request->latitude_d;
        $d->latitude_m                            = $request->latitude_m;
        $d->latitude_s                            = $request->latitude_s;
        $d->latitude_decimal                      = $request->latitude_decimal;
        $d->longitude                             = $request->longitude;
        $d->longitude_d                           = $request->longitude_d;
        $d->longitude_m                           = $request->longitude_m;
        $d->longitude_s                           = $request->longitude_s;
        $d->longitude_decimal                     = $request->longitude_decimal;
        $d->altitude                              = $request->altitude;
        $d->design_capacity                       = $request->design_capacity;
        $d->catchment_size                        = $request->catchment_size;
        $d->gdp                                   = $request->gdp;
        $d->people_recovered                      = $request->people_recovered;
        $d->people_positive_past                  = $request->people_positive_past;
        $d->people_recovered_past                 = $request->people_recovered_past;
        $d->sample_matrix                         = $request->sample_matrix;
        $d->sample_from_hour                      = $request->sample_from_hour;
        $d->sample_to_hour                        = $request->sample_to_hour;
        $d->sample_to_day                         = $request->sample_to_day;
        $d->sample_to_month                       = $request->sample_to_month;
        $d->sample_to_year                        = $request->sample_to_year;
        $d->type_of_sample                        = $request->type_of_sample;
        $d->type_of_composite_sample              = $request->type_of_composite_sample;
        $d->sample_interval                       = $request->sample_interval;
        $d->flow_total                            = $request->flow_total;
        $d->flow_minimum                          = $request->flow_minimum;
        $d->flow_maximum                          = $request->flow_maximum;
        $d->temperature                           = $request->temperature;
        $d->cod                                   = $request->cod;
        $d->total_n_nh4_n                         = $request->total_n_nh4_n;
        $d->tss                                   = $request->tss;
        $d->dry_weather_conditions                = $request->dry_weather_conditions;
        $d->last_rain_event                       = $request->last_rain_event;
        $d->associated_phenotype                  = $request->associated_phenotype;
        $d->genetic_marker                        = $request->genetic_marker;
        $d->date_of_sample_preparation            = $request->date_of_sample_preparation;
        $d->storage_of_sample                     = $request->storage_of_sample;
        $d->volume_of_sample                      = $request->volume_of_sample;
        $d->internal_standard_used1               = $request->internal_standard_used1;
        $d->method_used_for_sample_preparation    = $request->method_used_for_sample_preparation;
        $d->date_of_rna_extraction                = $request->date_of_rna_extraction;
        $d->method_used_for_rna_extraction        = $request->method_used_for_rna_extraction;
        $d->internal_standard_used2               = $request->internal_standard_used2;
        $d->rna1                                  = $request->rna1;
        $d->rna2                                  = $request->rna2;
        $d->replicates1                           = $request->replicates1;
        $d->analytical_method_type                = $request->analytical_method_type;
        $d->analytical_method_type_other          = $request->analytical_method_type_other;
        $d->date_of_analysis                      = $request->date_of_analysis;
        $d->lod1                                  = $request->lod1;
        $d->lod2                                  = $request->lod2;
        $d->loq1                                  = $request->loq1;
        $d->loq2                                  = $request->loq2;
        $d->uncertainty_of_the_quantification     = $request->uncertainty_of_the_quantification;
        $d->efficiency                            = $request->efficiency;
        $d->rna3                                  = $request->rna3;
        $d->pos_control_used                      = $request->pos_control_used;
        $d->replicates2                           = $request->replicates2;
        $d->comment                               = $request->comment;
        $d->save();

        return redirect()->route('dataTable.index')->with('success', 'The file was succesfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Sars::find($id)->delete();

        return redirect()->route('dataTable.index')->with('success', 'The file was deleted.');
    }
 
}
