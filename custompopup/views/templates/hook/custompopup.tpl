{if $popup_enabled}
{literal}
    <script>
        $(function() {

            var popup = new $.Popup();
            if ($.cookie('responsive_popup') == null) {
                popup.open('#inline');
            }
            $(".popup_close").click(function(){
                $.cookie('responsive_popup', 'yes', { expires: {/literal}{$popup_cookie*0.000694}{literal}, path: '/' });
            });

            var instances = $('.popup').length;
            if(instances > 1)
            {
                $( ".popup" ).last().remove();
                $( ".popup_back" ).last().remove();
                $( ".popup_close" ).last().remove();
            }
        });
    </script>{/literal}
{/if}
{literal}<style>
        div.popup {
            background-color:{/literal} {$popup_color}{literal};
            padding:{/literal} {$padding}{literal}px;
            padding-top:{/literal} {$top_padding}{literal}px;
        }
        .popup_back {
            background-color: {/literal}{$back_color}{literal};
        }
        .popup_close:hover {
            color: {/literal}{$button_hover_color}{literal};
        }
        .popup_close {
            color: {/literal}{$button_color}{literal};
            top: {/literal}{$button_top_padding}{literal}px;
            font-size: {/literal}{$button_size}{literal}px;
            {/literal}{$button_position}{literal}: 5px;
        }
    </style>
{/literal}


<div id="inline" style="display:none">
       {$content_{$cookie->id_lang}|unescape:'html'}
</div>
