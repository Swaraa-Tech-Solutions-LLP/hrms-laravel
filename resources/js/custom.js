function toggleFullscreen() {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen().catch((err) => {
            console.error(`Error attempting to enable full-screen mode: ${err.message}`);
        });
    } else {
        document.exitFullscreen();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('fullscreenBtn').addEventListener('click', toggleFullscreen);
});
