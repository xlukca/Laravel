<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use MongoDB\Laravel\Eloquent\Model; // MongoDB

class Sars extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'type_of_data',
        'data_provider',
        'contact_person',
        'address_of_contact',
        'email',
        'laboratory',
        'name_of_country',
        'name_of_city',
        'station_name',
        'national_code',
        'relevant_ec_code_wise',
        'relevant_ec_code_other',
        'other_code',
        'latitude',
        'latitude_d',
        'latitude_m',
        'latitude_s',
        'latitude_decimal',
        'longitude',
        'longitude_d',
        'longitude_m',
        'longitude_s',
        'longitude_decimal',
        'altitude',
        'design_capacity',
        'population_served',
        'catchment_size',
        'gdp',
        'people_positive',
        'people_recovered',
        'people_positive_past',
        'people_recovered_past',
        'sample_matrix',
        'sample_from_hour',
        'sample_from_day',
        'sample_from_month',
        'sample_from_year',
        'sample_to_hour',
        'sample_to_day',
        'sample_to_month',
        'sample_to_year',
        'type_of_sample',
        'type_of_composite_sample',
        'sample_interval',
        'flow_total',
        'flow_minimum',
        'flow_maximum',
        'temperature',
        'cod',
        'total_n_nh4_n',
        'tss',
        'dry_weather_conditions',
        'last_rain_event',
        'associated_phenotype',
        'genetic_marker',
        'date_of_sample_preparation',
        'storage_of_sample',
        'volume_of_sample',
        'internal_standard_used1',
        'method_used_for_sample_preparation',
        'date_of_rna_extraction',
        'method_used_for_rna_extraction',
        'internal_standard_used2',
        'rna1',
        'rna2',
        'replicates1',
        'analytical_method_type',
        'analytical_method_type_other',
        'date_of_analysis',
        'lod1',
        'lod2',
        'loq1',
        'loq2',
        'uncertainty_of_the_quantification',
        'efficiency',
        'rna3',
        'pos_control_used',
        'replicates2',
        'ct',
        'gene1',
        'gene2',
        'comment',
        'sars_save',
        'sars_source',
        'sars_source_dir',
        'longitude_decimal_show',
        'latitude_decimal_show',
        'noexport'
    ];

    public function file() {
        return $this->hasOne(File::class, 'id','file_id');
    }
}
