<span class="badge 
{{ $membership == 'user'?'bg-info':' ' }}
{{ $membership == 'vendor'?'bg-primary':' ' }}
{{ $membership == 'company'?'bg-success':' ' }}
">
{{ trans('admin.'.$membership) }}

</span>