<?php

namespace Duobix\Sales\Enums;

enum OrderStatus: string
{
    case Pending = 'Pending';           // The order has been placed, but payment has not yet been completed.
    case Confirmed = 'Confirmed';       // Payment has been processed successfully, and the tickets are confirmed.
    case TicketIssued = 'Ticket Issued';// The tickets have been issued (electronically or via email) to the customer.
    case Canceled = 'Canceled';         // The order was canceled by the customer or due to a payment issue.
    case Refunded = 'Refunded';         // The order was refunded due to cancellation or customer request.
    case CheckedIn = 'Checked-In';      // The customer has used the ticket to check in to the event.
    case Failed = 'Failed';             // Payment or some part of the order processing failed.
}

