@extends('layouts.app')

@section('title', __('policy.title'))

@section('content')
<div class="container policy-page">
    <h1>{{ __('policy.title') }}</h1>
    <p class="policy-update">{{ __('policy.last_updated', ['date' => date('d.m.Y')]) }}</p>
    
    <div class="policy-content">
        <section>
            <h2>{{ __('policy.general_provisions') }}</h2>
            <p>{!! __('policy.general_text') !!}</p>
        </section>
        
        <section>
            <h2>{{ __('policy.basic_concepts') }}</h2>
            <ul>
                <li><strong>{{ __('policy.personal_data') }}</strong> - {{ __('policy.personal_data_def') }}</li>
                <li><strong>{{ __('policy.processing') }}</strong> - {{ __('policy.processing_def') }}</li>
                <li><strong>{{ __('policy.operator') }}</strong> - {{ __('policy.operator_def') }}</li>
                <li><strong>{{ __('policy.subject') }}</strong> - {{ __('policy.subject_def') }}</li>
            </ul>
        </section>
        
        <section>
            <h2>{{ __('policy.processing_purposes') }}</h2>
            <p>{{ __('policy.company_info') }} {{ __('policy.processing_purposes') }}:</p>
            <ul>
                @foreach(__('policy.purposes_list') as $purpose)
                    <li>{{ $purpose }}</li>
                @endforeach
            </ul>
        </section>
        
        <section>
            <h2>{{ __('policy.legal_basis') }}</h2>
            <p>{!! __('policy.legal_basis_text') !!}</p>
        </section>
        
        <section>
            <h2>{{ __('policy.data_categories') }}</h2>
            <p>{!! __('policy.clients_data') !!}</p>
            <ul>
                @foreach(__('policy.clients_list') as $data)
                    <li>{{ $data }}</li>
                @endforeach
            </ul>
            
            <p>{!! __('policy.candidates_data') !!}</p>
            <ul>
                @foreach(__('policy.candidates_list') as $data)
                    <li>{{ $data }}</li>
                @endforeach
            </ul>
            
            <p>{!! __('policy.visitors_data') !!}</p>
            <ul>
                @foreach(__('policy.visitors_list') as $data)
                    <li>{{ $data }}</li>
                @endforeach
            </ul>
        </section>
        
        <section>
            <h2>{{ __('policy.processing_principles') }}</h2>
            <ul>
                @foreach(__('policy.principles_list') as $principle)
                    <li>{{ $principle }}</li>
                @endforeach
            </ul>
        </section>
        
        <section>
            <h2>{{ __('policy.processing_conditions') }}</h2>
            <ul>
                @foreach(__('policy.conditions_list') as $condition)
                    <li>{{ $condition }}</li>
                @endforeach
            </ul>
        </section>
        
        <section>
            <h2>{{ __('policy.storage_period') }}</h2>
            <p>{!! __('policy.storage_text') !!}</p>
        </section>
        
        <section>
            <h2>{{ __('policy.security_measures') }}</h2>
            <ul>
                @foreach(__('policy.security_list') as $measure)
                    <li>{{ $measure }}</li>
                @endforeach
            </ul>
        </section>
        
        <section>
            <h2>{{ __('policy.rights_of_subjects') }}</h2>
            <ul>
                @foreach(__('policy.rights_list') as $right)
                    <li>{{ $right }}</li>
                @endforeach
            </ul>
        </section>
        
        <section>
            <h2>{{ __('policy.cross_border_transfer') }}</h2>
            <p>{!! __('policy.cross_border_text') !!}</p>
        </section>
        
        <section>
            <h2>{{ __('policy.final_provisions') }}</h2>
            <p>{!! __('policy.final_provisions_text', [
                'email' => __('policy.company_email'),
                'policy_url' => url('/policy')
            ]) !!}</p>
        </section>
        
        <section class="contacts-section">
            <h2>{{ __('policy.contacts') }}</h2>
            <p>{!! __('policy.contacts_text', ['email' => __('policy.company_email')]) !!}</p>
            <p>{{ __('policy.company_address') }}</p>
        </section>
    </div>
</div>

<style>
.policy-page {
    max-width: 1000px;
    margin: 40px auto;
    padding: 0 20px;
}

.policy-page h1 {
    color: #012615;
    margin-bottom: 15px;
    text-align: center;
    font-size: 28px;
}

.policy-update {
    text-align: center;
    color: #666;
    margin-bottom: 40px;
    font-style: italic;
}

.policy-content section {
    margin-bottom: 30px;
}

.policy-content h2 {
    color: #ec732c;
    font-size: 20px;
    margin-bottom: 15px;
    border-bottom: 2px solid #f0f0f0;
    padding-bottom: 8px;
}

.policy-content p {
    line-height: 1.6;
    color: #555;
    margin-bottom: 15px;
}

.policy-content ul {
    margin-left: 25px;
    margin-bottom: 15px;
}

.policy-content li {
    margin-bottom: 8px;
    line-height: 1.5;
}

.contacts-section {
    background: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    border-left: 4px solid #ec732c;
}
    .policy-content li{
        color: #666 !important;
    }
@media (max-width: 768px) {
    .policy-page {
        margin: 20px auto;
        padding: 0 15px;
    }
    
    .policy-page h1 {
        font-size: 24px;
    }
    
    .policy-content h2 {
        font-size: 18px;
    }
    
    .policy-content ul {
        margin-left: 20px;
    }


}
</style>
@endsection