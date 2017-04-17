<?php

namespace App\Http\Controllers\Web\Shop;

use App\DataTables\Panel\Shop\OrderDataTable;
use App\DataTables\Scopes\Panel\Shop\Order\ClientScope;
use App\Modules\Shop\Builder\Orders\Client\HtmlBuilder;
use App\Modules\Shop\Orders\Order;
use App\Modules\Web\Builder\HtmlBuilder as WebHtmlBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private $webBreadcrumb;

    private $webHtmlBuilder;

    private $order;
    
    private $htmlBuilder;

    public function __construct(
                                HtmlBuilder     $htmlBuilder,
                                WebHtmlBuilder  $webHtmlBuilder,
                                Order           $order
                                )
    {
        $this->webBreadcrumb   = true;
        $this->webHtmlBuilder  = $webHtmlBuilder;
        $this->order           = $order;
        $this->htmlBuilder     = $htmlBuilder;
    }
    
    public function index(OrderDataTable $dataTable)
    {
        $breadcrumb            = $this->webHtmlBuilder->breadcrumbOrder();

        $view_dataTable        = $this->htmlBuilder->dataTablePanelIndex();

        $multiple_form_actions = $this->htmlBuilder->dataTableMultipleFormActions();

        return $dataTable->addScope(new ClientScope(Auth::user()))
            ->render('panel.form.index', compact('view_dataTable', 'breadcrumb', 'multiple_form_actions'));
    }

    public function show(Order $order)
    {
        $breadcrumb = $this->webHtmlBuilder->breadcrumbCar();

        return view('web.products.car', compact('order', 'breadcrumb'))->with(['webBreadcrumb' => $this->webBreadcrumb]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $destroy_ids = explode(',', $request->get('destroy_ids'));

        foreach ($destroy_ids as $id) {

            $order = $this->order->query()->findOrFail($id);

            if ($order->status <= 2) {

                $order->update(['status' => 3]);
            }
        }

        return response()->json($destroy_ids, 200);
    }
}
