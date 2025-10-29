import Chart from "chart.js/auto";

document.addEventListener("DOMContentLoaded", () => {
    const ctx = document.getElementById("progressChart");
    if (!ctx || !window.taskData) return;

    const { completed, inProgress, pending } = window.taskData;

    new Chart(ctx, {
        type: "doughnut",
        data: {
            datasets: [
                {
                    data: [completed, inProgress, pending],
                    backgroundColor: [
                        "rgba(34, 197, 94, 0.8)", // Green
                        "rgba(59, 130, 246, 0.8)", // Blue
                        "rgba(234, 179, 8, 0.8)", // Yellow
                    ],
                    borderColor: "#fff",
                    borderWidth: 3,
                    hoverOffset: 20,
                },
            ],
        },
        options: {
            responsive: true,
            cutout: "70%",
            plugins: {
                legend: {
                    position: "bottom",
                    labels: {
                        color: "#374151",
                        font: { size: 14, weight: "500" },
                        padding: 20,
                    },
                },
                title: {
                    display: true,
                    text: "Task Completion Breakdown",
                    color: "#111827",
                    font: { size: 18, weight: "bold" },
                    padding: { top: 10, bottom: 30 },
                },
            },
            animation: {
                animateScale: true,
                animateRotate: true,
            },
        },
    });
});
