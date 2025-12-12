<!DOCTYPE html>
<html>
<head>
    <title>Distance Calculator</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<h2>Check Distance</h2>

<div>
    <label>From:</label>
    <input type="text" id="from" placeholder="Enter source">
</div>

<div>
    <label>To:</label>
    <input type="text" id="to" placeholder="Enter destination">
</div>

<button onclick="calculateDistance()">Get Distance</button>

<hr>

<h3>Result:</h3>
<p><strong>Distance:</strong> <span id="distance">—</span></p>
<p><strong>Duration:</strong> <span id="duration">—</span></p>

<script>
function calculateDistance() {
    let from = document.getElementById('from').value.trim();
    let to = document.getElementById('to').value.trim();

    if (!from || !to) {
        alert("Enter valid locations!");
        return;
    }

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
    });
}
</script>

</body>
</html>
