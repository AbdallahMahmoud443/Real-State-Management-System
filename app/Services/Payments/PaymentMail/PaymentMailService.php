<?php

namespace App\Services\Payments\PaymentMail;

use App\Mail\AdminPaymentNotification;
use App\Mail\PaymentMailToAgent;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;


class PaymentMailService
{
    public function sendPaymentMailToAgent(Model $order)
    {
        // After successful payment processing
        $emailData = [
            'agent_name' => $order->agent->name,
            'order_id' => 'INV-' . $order->id,
            'transaction_id' => $order->transaction_id,
            'payment_method' => $order->payment_method,
            'purchase_date' => $order->purchase_date,
            'expire_date' => $order->expire_date,
            'package_name' => $order->package->name,
            'status' => $order->status,
            'paid_amount' => $order->paid_amount,
            'dashboard_link' => route('agent.dashboard.show')
        ];
        Mail::to($order->agent->email)->send(new PaymentMailToAgent('Payment Confirmation', $emailData));

        // Also send notification to admin
        $this->sendPaymentNotificationToAdmin($order);
    }

    public function sendPaymentNotificationToAdmin(Model $order)
    {
        // Get admin email from Admin model or config
        $adminEmails = Admin::pluck('email')->toArray();
        if (empty($adminEmails)) {
            // Fallback to a default admin email if no admins found
            $adminEmails = [config('mail.admin_email', 'admin@example.com')];
        }
        $emailData = [
            'agent_name' => $order->agent->name,
            'agent_email' => $order->agent->email,
            'agent_id' => $order->agent->id,
            'order_id' => 'INV-' . $order->id,
            'transaction_id' => $order->transaction_id,
            'payment_method' => $order->payment_method,
            'purchase_date' => $order->purchase_date,
            'expire_date' => $order->expire_date,
            'package_name' => $order->package->name,
            'status' => $order->status,
            'paid_amount' => $order->paid_amount,
            'admin_dashboard_link' => route('admin.dashboard.show')
        ];
        Mail::to($adminEmails)->send(new AdminPaymentNotification('New Package Purchase', $emailData));
    }
}
