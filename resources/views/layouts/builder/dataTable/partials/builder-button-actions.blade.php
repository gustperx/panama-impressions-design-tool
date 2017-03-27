@if(isset($view_dataTable['button-actions']))

    <div class="buttongroup" align="right">

        <div class="button-group">

            @foreach($view_dataTable['button-actions'] as $action)

                <button

                        type="button"

                        class="btn btn-pill {{ array_has($action, 'buttonClass') ? $action['buttonClass'] ? $action['buttonClass'] : '' : '' }}"

                        title="{{ array_has($action, 'buttonTitle') ? $action['buttonTitle'] ? $action['buttonTitle'] : '' : '' }}"

                        id="{{ array_has($action, 'buttonId') ? $action['buttonId'] ? $action['buttonId'] : '' : '' }}"
                >

                    <i
                            class="livicon"

                            data-name="{{ array_has($action, 'data-name') ? $action['data-name'] ? $action['data-name'] : 'ghost' : 'eye-close' }}"

                            data-size="{{ array_has($action, 'data-size') ? $action['data-size'] ? $action['data-size'] : '25' : '25' }}"

                            data-loop="{{ array_has($action, 'data-loop') ? $action['data-loop'] ? $action['data-loop'] : 'true' : 'true' }}"

                            data-c="{{ array_has($action, 'data-c') ? $action['data-c'] ? $action['data-c'] : '#fff' : '#fff' }}"

                            data-hc="{{ array_has($action, 'data-hc') ? $action['data-hc'] ? $action['data-hc'] : 'white' : 'white' }}"
                    >
                    </i>

                </button>

            @endforeach

        </div>

    </div>

@endif