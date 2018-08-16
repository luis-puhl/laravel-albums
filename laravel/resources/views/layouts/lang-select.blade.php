<a id="langDropdown" class="nav-link dropdown-toggle" href="#"
    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
    <i class="mw-interlanguage-selector mw-ui-button"></i>  Languages <span class="caret"></span>
</a>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="langDropdown">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
            {{ $properties['native'] }}
        </a>
    @endforeach
</div>
