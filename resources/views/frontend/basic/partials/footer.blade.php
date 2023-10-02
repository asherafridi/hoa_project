@php
    $social = setting_list('social_icon');
    $event_menu = setting_list('event_menu');
    $document_menu = setting_list('event_menu');
    $people_menu = setting_list('people_menu');
@endphp
<footer id="section-footer" class="footer moto-section" data-widget="section" data-container="section">
    <div class="moto-widget moto-widget-block moto-bg-color2_2 moto-spacing-top-large moto-spacing-right-auto moto-spacing-bottom-large moto-spacing-left-auto"
        data-widget="block" data-spacing="lala" style="" data-bg-position="left top">

        <div class="container-fluid">
            <div class="row">
                <div class="moto-cell col-sm-12" data-container="container">

                    <div class="moto-widget moto-widget-row row-fixed moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto"
                        data-grid-type="sm" data-widget="row" data-spacing="aama" style=""
                        data-bg-position="left top">

                        <div class="container-fluid">
                            <div class="row" data-container="container">


                                <div class="moto-widget moto-widget-row__column moto-cell col-sm-3 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                                    style="" data-widget="row.column" data-container="container"
                                    data-spacing="aaaa" data-bg-position="left top">

                                    <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto"
                                        data-widget="text" data-preset="default" data-spacing="aasa"
                                        data-animation="">
                                        <div class="moto-widget-text-content moto-widget-text-editable">
                                            <p class="moto-text_system_14">{{settings('footer_title')}}</p>
                                        </div>
                                    </div>
                                    <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto"
                                        data-widget="text" data-preset="default" data-spacing="aasa"
                                        data-animation="">
                                        <div class="moto-widget-text-content moto-widget-text-editable">
                                            <p class="moto-text_normal">{{settings('footer_desc' , null)}}</p>
                                        </div>
                                    </div>
                                    <div id="wid_1519854965_tvg379dob" data-widget-id="wid_1519854965_tvg379dob"
                                        class="moto-widget moto-widget-social-links-extended moto-preset-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto  "
                                        data-widget="social_links_extended" data-preset="default">
                                        <ul class="moto-widget-social-links-extended__list">
                                            @foreach ($people_menu as $item)
                                            <li
                                                class="moto-widget-social-links-extended__item moto-widget-social-links-extended__item-1">
                                                
                                                @php
                                                $desc=json_decode($item['description']);
                                            @endphp
                                                <a href="{{$desc->url}}"
                                                    class="moto-widget-social-links-extended__link"
                                                    target="_self">
                                                    {!!$desc->social_icon!!}
                                                </a>
                                            </li>
                                                
                                            @endforeach
                                            
                                        </ul>
                                        <style type="text/css">
                                        </style>
                                    </div>
                                </div>
                                <div class="moto-widget moto-widget-row__column moto-cell col-sm-3 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                                    style="" data-widget="row.column" data-container="container"
                                    data-spacing="aaaa" data-bg-position="left top">

                                    <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto"
                                        data-widget="text" data-preset="default" data-spacing="aasa"
                                        data-animation="">
                                        <div class="moto-widget-text-content moto-widget-text-editable">
                                            <p class="moto-text_system_14">Upcoming Events</p>
                                        </div>
                                    </div>
                                    <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto"
                                        data-widget="text" data-preset="default" data-spacing="aama"
                                        data-animation="">
                                        <div class="moto-widget-text-content moto-widget-text-editable">
                                            
                                            @foreach (events() as $item)
                                            
                                                    <p class="moto-text_201"><a
                                                        href="{{route('event')}}"
                                                        target="_self" data-action="url" class="moto-link">
                                                    {{$item->name}}</a></p>
                                                <p class="moto-text_201">&nbsp;</p>

                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="moto-widget moto-widget-row__column moto-cell col-sm-3 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                                    style="" data-widget="row.column" data-container="container"
                                    data-spacing="aaaa" data-bg-position="left top">

                                    <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto"
                                        data-widget="text" data-preset="default" data-spacing="aasa"
                                        data-animation="">
                                        <div class="moto-widget-text-content moto-widget-text-editable">
                                            <p class="moto-text_system_14">Documents</p>
                                        </div>
                                    </div>
                                    <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto"
                                        data-widget="text" data-preset="default" data-spacing="aama"
                                        data-animation="">
                                        <div class="moto-widget-text-content moto-widget-text-editable">
                                            
                                                   
                                            @foreach (documents() as $item)
                                            
                                                    <p class="moto-text_201"><a
                                                        href="#"
                                                        target="_self" data-action="url" class="moto-link">
                                                    {{$item->name}}</a></p>
                                                <p class="moto-text_201">&nbsp;</p>

                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="moto-widget moto-widget-row__column moto-cell col-sm-3 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                                    style="" data-widget="row.column" data-container="container"
                                    data-spacing="aaaa" data-bg-position="left top">

                                    <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto"
                                        data-widget="text" data-preset="default" data-spacing="aasa"
                                        data-animation="">
                                        <div class="moto-widget-text-content moto-widget-text-editable">
                                            <p class="moto-text_system_14">Contact Us</p>
                                        </div>
                                    </div>
                                    <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                                        data-widget="text" data-preset="default" data-spacing="aaaa"
                                        data-animation="">
                                        <div class="moto-widget-text-content moto-widget-text-editable">
                                              
                                            @foreach (contacts() as $item)
                                            
                                                    <p class="moto-text_201"><a
                                                        href="#"
                                                        target="_self" data-action="url" class="moto-link">
                                                    {{$item}}</a></p>
                                                <p class="moto-text_201">&nbsp;</p>

                                            @endforeach
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="moto-widget moto-widget-row row-fixed moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                        data-grid-type="sm" data-widget="row" data-spacing="aaaa" style=""
                        data-bg-position="left top">

                        <div class="container-fluid">
                            <div class="row" data-container="container">


                                <div class="moto-widget moto-widget-row__column moto-cell col-sm-12 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                                    style="" data-widget="row.column" data-container="container"
                                    data-spacing="aaaa" data-bg-position="left top">

                                    <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                                        data-widget="text" data-preset="default" data-spacing="aaaa"
                                        data-visible-on="-" data-animation="">
                                        <div class="moto-widget-text-content moto-widget-text-editable">
                                            <p class="moto-text_normal">{!!settings('bottom_footer_text')!!}</p>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>