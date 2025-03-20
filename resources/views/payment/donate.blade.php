<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate to {{ $campaign->title }}</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <h2>Donate to: {{ $campaign->title }}</h2>
    <p>Campaign Description: {{ $campaign->description }}</p>
    <form id="paymentForm">
        <label for="amount">Enter Amount (INR): </label>
        <input type="number" id="amount" name="amount" required>
        <button type="button" id="payButton">Pay Now</button>
    </form>

    <script>
        document.getElementById("payButton").onclick = function () {
            var amount = document.getElementById("amount").value;
            if (amount <= 0) {
                alert("Please enter a valid amount");
                return;
            }
            
            fetch("{{ route('process.payment') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ amount: amount })
            })
            .then(response => response.json())
            .then(data => {
                var options = {
                    key: "{{ env('RAZORPAY_KEY') }}",
                    amount: data.amount,
                    currency: "INR",
                    name: "Crowd Fund",
                    description: "Donation Payment",
                    order_id: data.order_id,
                    handler: function (response) {
                        alert("Payment Successful! Payment ID: " + response.razorpay_payment_id);
                        window.location.href = "{{ route('home') }}"; // Redirect after payment
                    }
                };
                var rzp = new Razorpay(options);
                rzp.open();
            })
            .catch(error => console.error("Error:", error));
        };
    </script>
</body>
</html>