@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Check Distance') }}</div>

                <div class="card-body">
                    <div class="mb-4">
                        <label class="form-label">From:</label>
                        <input type="text" id="from" class="form-control" placeholder="Enter source">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">To:</label>
                        <input type="text" id="to" class="form-control" placeholder="Enter destination">
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-primary" onclick="calculateDistance()">Get Distance</button>
                    </div>

                    <hr class="my-4">

                    <h3 class="h5 mb-3">Result:</h3>
                    <div class="p-3 bg-light rounded-3">
                        <p class="mb-2"><strong>Distance:</strong> <span id="distance" class="text-primary">—</span></p>
                        <p class="mb-0"><strong>Duration:</strong> <span id="duration" class="text-primary">—</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function calculateDistance() {
    let from = document.getElementById('from').value.trim();
    let to = document.getElementById('to').value.trim();

    if (!from || !to) {
        alert("Enter valid locations!");
        return;
    }

    const btn = event.target;
    const originalText = btn.textContent;
    btn.disabled = true;
    btn.textContent = "Calculating...";

    fetch("/calculate-distance", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            from: from,
            to: to
        })
    })
    .then(res => res.json())
    .then(data => {
        if (!data.success) {
            document.getElementById("distance").innerHTML = "—";
            document.getElementById("duration").innerHTML = "—";
            alert(data.message);
            return;
        }

        document.getElementById("distance").innerHTML = data.distanceText;
        document.getElementById("duration").innerHTML = data.duration;
    })
    .catch(err => {
        alert("Error calculating distance.");
        console.log(err);
    })
    .finally(() => {
        btn.disabled = false;
        btn.textContent = originalText;
    });
}
</script>
@endsection
