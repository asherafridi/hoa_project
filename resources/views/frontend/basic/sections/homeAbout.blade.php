@php
    $community = setting_list('community_icon');
@endphp
<div class="moto-widget moto-widget-block moto-spacing-top-large moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                data-widget="block" data-spacing="laaa" style="" data-bg-position="left top">

                <div class="container-fluid">
                    <div class="row">
                        <div class="moto-cell col-sm-12" data-container="container">

                            <div class="moto-widget moto-widget-row row-fixed moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                                data-grid-type="sm" data-widget="row" data-spacing="aaaa" style=""
                                data-bg-position="left top">

                                <div class="container-fluid">
                                    <div class="row" data-container="container">


                                        <div class="moto-widget moto-widget-row__column moto-cell col-sm-4 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                                            style="" data-widget="row.column" data-container="container"
                                            data-spacing="aaaa" data-bg-position="left top">

                                            <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto"
                                                data-widget="text" data-preset="default" data-spacing="aasa"
                                                data-animation="">
                                                <div class="moto-widget-text-content moto-widget-text-editable">
                                                    <p class="moto-text_system_2">{{settings('community_subtitle')}}</p>
                                                    <p class="moto-text_system_2">&nbsp;</p>
                                                    <h2 class="moto-text_system_6">{{settings('community_title')}}
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-medium moto-spacing-bottom-auto moto-spacing-left-auto"
                                                data-widget="text" data-preset="default" data-spacing="amaa"
                                                data-animation="">
                                                <div class="moto-widget-text-content moto-widget-text-editable">
                                                    <p class="moto-text_normal">{{settings('community_dec')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        @foreach ($community as $item)
                                        @php
                                            $desc=json_decode($item['description']);
                                        @endphp
                                        
                                        <div class="moto-widget moto-widget-row__column moto-cell col-sm-2 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                                            style="" data-widget="row.column" data-container="container"
                                            data-spacing="aaaa" data-bg-position="left top">

                                            <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                                                data-widget="text" data-preset="default" data-spacing="saaa"
                                                data-animation="">
                                                <div class="moto-widget-text-content moto-widget-text-editable">
                                                    <p class="moto-text_system_8"><span
                                                            class="moto-content-image-plugin-wrapper moto-spacing-top-zero moto-spacing-right-zero moto-spacing-bottom-small moto-spacing-left-zero"><span
                                                                class="moto-content-image-container"><img
                                                                    class="moto-content-image"
                                                                    data-path="2018/02/mt-1359-home-icon01.png"
                                                                    data-id="186" alt="" width="44"
                                                                    height="51"
                                                                    src="{{$desc->social_icon}}"></span></span>
                                                    </p>
                                                    <h3 class="moto-text_system_8"><a target="_self"
                                                            data-action="url" class="moto-link"
                                                            href="https://template66387.motopreview.com/#">{{$desc->title}}</a>
                                                    </h3>
                                                    <p class="moto-text_normal">&nbsp;</p>
                                                    <p class="moto-text_normal">{{$desc->desc}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach



                                    </div>
                                </div>
                            </div>
                            <div data-widget-id="wid_1519853442_4auilfy3f"
                                class="moto-widget moto-widget-spacer moto-preset-default moto-spacing-top-medium moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto "
                                data-widget="spacer" data-preset="default" data-spacing="masa"
                                data-visible-on="+desktop,tablet,mobile-h,mobile-v">
                                <div class="moto-widget-spacer-block" style="height:10px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>