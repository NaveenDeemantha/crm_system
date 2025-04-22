<?php

namespace App\Notifications;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoiceNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $invoice;

    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $paymentUrl = route('checkout', ['invoice' => $this->invoice->id]);

        return (new MailMessage)
            ->subject('Invoice #' . $this->invoice->invoice_number . ' - ' . $this->invoice->title)
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('Please find your invoice details below:')
            ->line('Invoice Number: ' . $this->invoice->invoice_number)
            ->line('Title: ' . $this->invoice->title)
            ->line('Description: ' . $this->invoice->description)
            ->line('Amount: LKR ' . number_format($this->invoice->amount, 2))
            ->line('Due Date: ' . $this->invoice->due_date->format('Y-m-d'))
            ->action('Pay Now', $paymentUrl)
            ->line('Thank you for your business!')
            ->line('If you have any questions, please contact us.');
    }

    public function toArray($notifiable)
    {
        return [
            'invoice_id' => $this->invoice->id,
            'invoice_number' => $this->invoice->invoice_number,
        ];
    }
} 