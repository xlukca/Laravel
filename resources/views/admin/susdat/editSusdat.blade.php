@extends('admin.layouts.app')
@section('content')

<div class="container">
    <h3 class="mb-5">Update of the Substance Data</h3>
    <div class="row">
        <div class="col-8">
            {{ Form::model($susdat, ['route' => ['susdat.update', $susdat->id], 'method' => 'PUT']) }}

            {{-- {{ Form::label('name', 'Name') }}
            {{ Form::text('name', $susdat->name, array('class' => 'form-control mb-3')) }} --}}

            @include('_templates.form-text', ['field_name' => 'name', 'field_name_text' => 'Name'])
            @include('_templates.form-text', ['field_name' => 'name_dashboard', 'field_name_text' => 'Name dashboard'])
            @include('_templates.form-text', ['field_name' => 'name_chemspider', 'field_name_text' => 'Name chemspider'])
            @include('_templates.form-text', ['field_name' => 'name_iupac', 'field_name_text' => 'Name IUPAC'])
            @include('_templates.form-text', ['field_name' => 'synonyms_chemspider', 'field_name_text' => 'Synonyms chemspider'])
            @include('_templates.form-text', ['field_name' => 'reliability_synonyms_chemspider', 'field_name_text' => 'Reliability synonyms chemspider'])
            @include('_templates.form-text', ['field_name' => 'cas_rn', 'field_name_text' => 'CAS RN'])
            @include('_templates.form-text', ['field_name' => 'cas_rn_dashboard', 'field_name_text' => 'Cas RN dashboard'])
            @include('_templates.form-text', ['field_name' => 'cas_rn_pubchem', 'field_name_text' => 'Cas RN pubchem'])
            @include('_templates.form-text', ['field_name' => 'cas_rn_cactus', 'field_name_text' => 'Cas RN cactus'])
            @include('_templates.form-text', ['field_name' => 'cas_rn_chemspider', 'field_name_text' => 'Cas RN chemspider'])
            @include('_templates.form-text', ['field_name' => 'reliability_cas_rn_chemspider', 'field_name_text' => 'Reliability cas RN chemspider'])
            @include('_templates.form-text', ['field_name' => 'validation_level', 'field_name_text' => 'Validation level'])
            @include('_templates.form-text', ['field_name' => 'smiles', 'field_name_text' => 'Smiles'])
            @include('_templates.form-text', ['field_name' => 'smiles_dashboard', 'field_name_text' => 'Smiles dashboard'])
            @include('_templates.form-text', ['field_name' => 'stdinchi', 'field_name_text' => 'StdInChI'])
            @include('_templates.form-text', ['field_name' => 'stdinchikey', 'field_name_text' => 'StdInChIKey'])
            @include('_templates.form-text', ['field_name' => 'ms_ready_smiles', 'field_name_text' => 'MS ready smiles'])
            @include('_templates.form-text', ['field_name' => 'ms_ready_stdinchi', 'field_name_text' => 'MS ready StdInChI'])
            @include('_templates.form-text', ['field_name' => 'ms_ready_stdinchikey', 'field_name_text' => 'MS ready StdInChIKey'])
            @include('_templates.form-text', ['field_name' => 'source', 'field_name_text' => 'Source'])
            @include('_templates.form-text', ['field_name' => 'pubchem_cid', 'field_name_text' => 'Pubchem CID'])
            @include('_templates.form-text', ['field_name' => 'chemspider_id', 'field_name_text' => 'Chemspider ID'])
            @include('_templates.form-text', ['field_name' => 'dtxsid', 'field_name_text' => 'DTXSID'])
            @include('_templates.form-text', ['field_name' => 'molecular_formula', 'field_name_text' => 'Molecular formula'])
            @include('_templates.form-text', ['field_name' => 'monoiso_mass', 'field_name_text' => 'Monoiso mass'])
            @include('_templates.form-text', ['field_name' => 'mhplus', 'field_name_text' => 'MH plus'])
            @include('_templates.form-text', ['field_name' => 'mhminus', 'field_name_text' => 'MH minus'])
            @include('_templates.form-text', ['field_name' => 'pred_rti_positive_esi', 'field_name_text' => 'PRED RTI Positive ESI'])
            @include('_templates.form-text', ['field_name' => 'uncertainty_rti_pos', 'field_name_text' => 'Uncertainty RTI POS'])
            @include('_templates.form-text', ['field_name' => 'pred_rti_negative_esi', 'field_name_text' => 'PRED RTI Negative ESI'])
            @include('_templates.form-text', ['field_name' => 'tetrahymena_pyriformis_toxicity', 'field_name_text' => 'Tetrahymena Pyriformis Toxicity'])
            @include('_templates.form-text', ['field_name' => 'igc50_48_hr', 'field_name_text' => 'IGC50 48 [hr]'])
            @include('_templates.form-text', ['field_name' => 'uncertainty_tetrahymena_pyriformis_toxicity', 'field_name_text' => 'Uncertainty tetrahymena pyriformis toxicity'])
            @include('_templates.form-text', ['field_name' => 'daphnia_toxicity', 'field_name_text' => 'Daphnia toxicity'])
            @include('_templates.form-text', ['field_name' => 'lc50_48_hr', 'field_name_text' => 'LC50 48 [hr]'])
            @include('_templates.form-text', ['field_name' => 'uncertainty_daphnia_toxicity', 'field_name_text' => 'Uncertainty daphnia toxicity'])
            @include('_templates.form-text', ['field_name' => 'algae_toxicity', 'field_name_text' => 'Algae toxicity'])
            @include('_templates.form-text', ['field_name' => 'ec50_72_hr', 'field_name_text' => 'EC50 72 [hr]'])
            @include('_templates.form-text', ['field_name' => 'uncertainty_algae_toxicity', 'field_name_text' => 'Uncertainty algae toxicity'])
            @include('_templates.form-text', ['field_name' => 'pimephales_promelas_toxicity', 'field_name_text' => 'Pimephales promelas toxicity'])
            @include('_templates.form-text', ['field_name' => 'lc50_96_hr', 'field_name_text' => 'LC50 96 [hr]'])
            @include('_templates.form-text', ['field_name' => 'uncertainty_pimephales_promelas_toxicity', 'field_name_text' => 'Uncertainty pimephales promelas toxicity'])
            @include('_templates.form-text', ['field_name' => 'logkow_episuite', 'field_name_text' => 'Logkow episuite'])
            @include('_templates.form-text', ['field_name' => 'exp_logkow_episuite', 'field_name_text' => 'EXP logkow episuite'])
            @include('_templates.form-text', ['field_name' => 'chemspider_id_based_on_inchikey_19032018', 'field_name_text' => 'Chemspider ID based on InCHiKey 19032018'])
            @include('_templates.form-text', ['field_name' => 'alogp_chemspider', 'field_name_text' => 'ALOGP chemspider'])
            @include('_templates.form-text', ['field_name' => 'xlogp_chemspider', 'field_name_text' => 'XLOGP chemspider'])
            @include('_templates.form-text', ['field_name' => 'lowest_p_pnec_qsar', 'field_name_text' => 'Lowest P PNEC QSAR'])
            @include('_templates.form-text', ['field_name' => 'species', 'field_name_text' => 'Species'])
            @include('_templates.form-text', ['field_name' => 'uncertainty', 'field_name_text' => 'Uncertainty'])
            @include('_templates.form-text', ['field_name' => 'exposurescore_water_kemi', 'field_name_text' => 'Exposurescore water KEMI'])
            @include('_templates.form-text', ['field_name' => 'hazscore_ecochronic_kemi', 'field_name_text' => 'Hazscore ecochronic KEMI'])
            @include('_templates.form-text', ['field_name' => 'validationlevel_kemi', 'field_name_text' => 'Validation level KEMI'])
            @include('_templates.form-text', ['field_name' => 'prob_of_gc', 'field_name_text' => 'PROB of GC'])
            @include('_templates.form-text', ['field_name' => 'prob_rplc', 'field_name_text' => 'PROB RPLC'])
            @include('_templates.form-text', ['field_name' => 'pred_chromatography', 'field_name_text' => 'PRED chromatography'])
            @include('_templates.form-text', ['field_name' => 'prob_of_both_ionization_source', 'field_name_text' => 'PROB of both ionization source'])
            @include('_templates.form-text', ['field_name' => 'prob_ei', 'field_name_text' => 'PROB EI'])
            @include('_templates.form-text', ['field_name' => 'prob_esi', 'field_name_text' => 'PROB ESI'])
            @include('_templates.form-text', ['field_name' => 'pred_ionization_source', 'field_name_text' => 'PRED ionization source'])
            @include('_templates.form-text', ['field_name' => 'prob_both_esi_mode', 'field_name_text' => 'PROB both ESI mode'])
            @include('_templates.form-text', ['field_name' => 'prob_plus_esi', 'field_name_text' => 'PROB plus ESI'])
            @include('_templates.form-text', ['field_name' => 'prob_minus_esi', 'field_name_text' => 'PROB minus ESI'])
            @include('_templates.form-text', ['field_name' => 'pred_esi_mode', 'field_name_text' => 'PRED ESI mode'])
            @include('_templates.form-text', ['field_name' => 'preferable_platform_by_decision_tree', 'field_name_text' => 'Preferable platform by decision tree'])
            @include('_templates.form-text', ['field_name' => 'synonyms', 'field_name_text' => 'Synonyms'])
            @include('_templates.form-text', ['field_name' => 'remark', 'field_name_text' => 'Remark'])
            
            {{ Form::submit('Submit', array('class' => 'btn btn-sm btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection('content')