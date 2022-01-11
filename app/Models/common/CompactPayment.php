<?php

namespace App\Models\common;

use Carbon\Carbon;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class CompactPayment extends Model
{
    use HasFactory, HasActionColumn;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'compact_id',
        'amount',
        'amount_receive',
        'payment_method_id',
        'payment_transer_type',
        'tranfer_fee',
        'rate',
        'content',
        'status',
        'created_by',
        'updated_by',
    ];

    public function compact()
    {
        return $this->hasOne(Compact::class, 'id', 'compact_id');
    }

    public function payment_method()
    {
        return $this->hasOne(PaymentMethod::class, 'id', 'payment_method_id');
    }

    public static function getDatatables($request)
    {
        $status = config('params.compact.payment_method_status');
        $payment = static::with('user', 'compact', 'payment_method')->where('status', '<>', 0);
        $payment_transer_type = config('params.compact.payment_transer_type');

        return DataTables::of($payment)
            ->filter(function ($query) use ($request) {
                if ($request->has('name')) {
                    $query->where('content', 'like', '%' . $request->get('name') . '%');
                }
                if ($request->has('status')) {
                    $query->where('status', $request->get('status'));
                }
                if ($request->has('compact_id')) {
                    $query->where('compact_id', $request->get('compact_id'));
                }
                if ($request->has('payment_method_id')) {
                    $query->where('payment_method_id', $request->get('payment_method_id'));
                }
                if ($request->has('date')) {
                    $date = explode('/', $request->get('date'));
                    try {
                        $dateRange = explode(' - ', $request->get('date'));
                        $query->where('created_at', '>=', Carbon::createFromFormat('d/m/Y', $dateRange[0])->toDateString() . ' 00:00:00');
                        $query->where('created_at', '<=', Carbon::createFromFormat('d/m/Y', $dateRange[1])->toDateString() . ' 23:59:59');
                    } catch (\Exception $e) {
                    }
                }
            })
            ->editColumn('payment_transer_type', function ($payment) use($payment_transer_type) {
                return isset($payment_transer_type[$payment->payment_transer_type]) ? $payment_transer_type[$payment->payment_transer_type] : '';
            })
            ->editColumn('status', function ($payment) use($status) {
                return isset($status[$payment->status]) ? $status[$payment->status] : '';
            })
            ->editColumn('payment_method_id', function ($payment) {
                return $payment->payment_method ? $payment->payment_method->name : '';
            })
            ->editColumn('compact_id', function ($payment) {
                return '<a href="' . route('compacts.edit', $payment->compact_id) . '">' . ($payment->compact ? $payment->compact->code : '') . '</a>';
            })
            ->editColumn('created_by', function ($payment) {
                return $payment->user ? $payment->user->name : '';
            })
            ->editColumn('content', function ($payment) {
                $sentence = preg_replace("/<[^>]+\>/i", " ", $payment->content);
                if(!$sentence) {
                    return '';
                }
                $html = $sentence;
                if (count(explode(' ', $sentence)) > 10) {
                    $html = implode(' ', array_slice(explode(' ', $sentence), 0, 10)) . '...';
                }
                $html = '<div class="title-tooltip">' . $html;
                $html .= '<div class="tooltiptext hidden">';
                $html .= '<p>' . $sentence . '</p>';
                $html .= '</div>';
                return $html.'</div>';
            })
            ->addColumn('action', function ($payment) {
                return $payment->generateActionColumn();
            })
            ->rawColumns(['action', 'content', 'compact_id'])
            ->make(true);
    }

    public static function getDatatablesInCompact($compact_id)
    {
        $payment_methods = PaymentMethod::pluck('name', 'id')->toArray();

        $compact_payment = self::query();

        return Datatables::of($compact_payment)
            ->filter(function ($query) use ($compact_id) {
                $query->where([
                    'compact_id' => (int)$compact_id
                ]);
            })
            ->editColumn('status', function ($compact_payment){
                return $compact_payment->getStatusText();
            })
            ->addColumn('payment_method', function ($compact_payment) use ($payment_methods){
                return isset($payment_methods[(int)$compact_payment->payment_method_id])?$payment_methods[(int)$compact_payment->payment_method_id]:'';
            })
            ->editColumn('amount', function ($compact_payment){
                return $compact_payment->amount;
            })
            ->editColumn('amount_receive', function ($compact_payment){
                return $compact_payment->amount_receive;
            })
            ->editColumn('updated_at', function ($compact_payment){
                return date('H:i d/m/Y', strtotime($compact_payment->updated_at));
            })
            ->addColumn('action', function ($compact_payment) {
                return $compact_payment->generateActionColumn();
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    protected function getActionColumnPermissions()
    {
        return [
            'compact_payment.edit' => '<a class="table-action-btn get-form" title="view" href="javascript:void(0)" data-href="' . route('compact_payment.edit', $this->id) . '"><i class="fa text-primary fa-pen-alt"></i></a> '
        ];
    }

    public function getStatusText()
    {
        $status = config('params.compact.payment_method_status');
        $status_label = config('params.compact.payment_method_status_label');

        if($this->status == 1) {
            return '<label class="badge bg-' . (isset($status_label[$this->status]) ? $status_label[$this->status] : '') . '">' . (isset($status[$this->status]) ? $status[$this->status] : '') . '</label> ' . ($this->completed);
        }
        return '<label class="badge bg-' . (isset($status_label[$this->status]) ? $status_label[$this->status] : '') . '">' . (isset($status[$this->status]) ? $status[$this->status] : '') . '</label>';
    }
}
