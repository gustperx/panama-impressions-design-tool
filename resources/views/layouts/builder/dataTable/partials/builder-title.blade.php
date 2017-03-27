<div class="panel-title pull-left">

    <div class="caption">

        <i
                class="livicon"

                data-name="{{ array_has($view_dataTable, 'data-name') ? $view_dataTable['data-name'] ? $view_dataTable['data-name'] : 'ghost' : 'eye-close' }}"

                data-size="{{ array_has($view_dataTable, 'data-size') ? $view_dataTable['data-size'] ? $view_dataTable['data-size'] : '20' : '20' }}"

                data-loop="{{ array_has($view_dataTable, 'data-loop') ? $view_dataTable['data-loop'] ? $view_dataTable['data-loop'] : 'true' : 'true' }}"

                data-c="{{ array_has($view_dataTable, 'data-c') ? $view_dataTable['data-c'] ? $view_dataTable['data-c'] : '#fff' : '#fff' }}"

                data-hc="{{ array_has($view_dataTable, 'data-hc') ? $view_dataTable['data-hc'] ? $view_dataTable['data-hc'] : 'white' : 'white' }}"
        >

        </i>

        {{ array_has($view_dataTable, 'title') ? $view_dataTable['title'] ? $view_dataTable['title'] : 'null' : 'No a definido el atributo titulo' }}

    </div>

</div>

<div class="tools pull-right"></div>