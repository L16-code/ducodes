document.addEventListener("DOMContentLoaded", function () {
    // Check if the globe container exists
    const globeDiv = document.getElementById("globe");
    if (!globeDiv) return;

    // Get the parent banner container for wider particle spreading
    const bannerContainer = document.querySelector(".banner-container");
    const container = bannerContainer || globeDiv.parentElement;

    // Import Three.js from CDN
    const script = document.createElement("script");
    script.src =
        "https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js";
    script.onload = initGlobe;
    document.head.appendChild(script);

    function initGlobe() {
        // Scene setup
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, 1, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({
            alpha: true,
            antialias: true,
        });

        // Position the renderer absolutely to cover the entire banner area
        renderer.domElement.style.position = "absolute";
        renderer.domElement.style.top = "1";
        renderer.domElement.style.left = "35%";
        renderer.domElement.style.width = "100%";
        renderer.domElement.style.height = "100%";
        renderer.domElement.style.pointerEvents = "none"; // Allow clicks to pass through

        // Set renderer size and append to container
        function updateRendererSize() {
            renderer.setSize(container.offsetWidth, container.offsetHeight);
            // Update camera aspect ratio
            camera.aspect = container.offsetWidth / container.offsetHeight;
            camera.updateProjectionMatrix();
        }

        updateRendererSize();
        container.appendChild(renderer.domElement);

        // Particle settings
        const particles = 1500;
        const radius = 7; // Globe radius
        const originalPositions = new Float32Array(particles * 3); // Store original positions
        const targetPositions = new Float32Array(particles * 3); // For scattered positions
        const group = new THREE.Group();

        // Create particles
        const geometry = new THREE.SphereGeometry(0.2, 16, 16);
        const material = new THREE.MeshPhongMaterial({
            color: "#00ffc8",
            emissive: "#00ffc8",
            wireframe: true,
            transparent: true,
            opacity: 0.8,
        });

        for (let i = 0; i < particles; i++) {
            const theta = Math.random() * Math.PI * 2;
            const phi = Math.acos(2 * Math.random() - 1);

            const x = radius * Math.sin(phi) * Math.cos(theta);
            const y = radius * Math.sin(phi) * Math.sin(theta);
            const z = radius * Math.cos(phi);

            originalPositions[i * 3] = x;
            originalPositions[i * 3 + 1] = y;
            originalPositions[i * 3 + 2] = z;

            const sphere = new THREE.Mesh(geometry, material);
            sphere.position.set(x, y, z);
            group.add(sphere);
        }

        scene.add(group);

        // Lights
        const ambientLight = new THREE.AmbientLight(0x404040, 1.5);
        const pointLight = new THREE.PointLight(0xffffff, 1.5);
        pointLight.position.set(10, 10, 10);
        scene.add(ambientLight, pointLight);

        // Camera position
        camera.position.z = 15;

        // Interaction states
        let isHovered = false;

        // Handle hover events
        globeDiv.addEventListener("mouseenter", () => {
            isHovered = true;

            for (let i = 0; i < particles; i++) {
                const scatterFactor = 1.2 + Math.random() * 0.5;
                const i3 = i * 3;

                targetPositions[i3] = originalPositions[i3] * scatterFactor;
                targetPositions[i3 + 1] =
                    originalPositions[i3 + 1] * scatterFactor;
                targetPositions[i3 + 2] =
                    originalPositions[i3 + 2] * scatterFactor;
            }
        });

        globeDiv.addEventListener("mouseleave", () => {
            isHovered = false;
        });

        // Make sure the animation can work across the entire container
        container.style.position = "relative";

        // Handle resize
        window.addEventListener("resize", function () {
            updateRendererSize();
            camera.aspect = 1;
            camera.updateProjectionMatrix();
        });

        // Animation loop
        function animate() {
            requestAnimationFrame(animate);

            const speed = 0.02;
            for (let i = 0; i < particles; i++) {
                const i3 = i * 3;
                const sphere = group.children[i];

                if (isHovered) {
                    sphere.position.x +=
                        (targetPositions[i3] - sphere.position.x) * speed;
                    sphere.position.y +=
                        (targetPositions[i3 + 1] - sphere.position.y) * speed;
                    sphere.position.z +=
                        (targetPositions[i3 + 2] - sphere.position.z) * speed;
                } else {
                    sphere.position.x +=
                        (originalPositions[i3] - sphere.position.x) * speed;
                    sphere.position.y +=
                        (originalPositions[i3 + 1] - sphere.position.y) * speed;
                    sphere.position.z +=
                        (originalPositions[i3 + 2] - sphere.position.z) * speed;
                }
            }

            group.rotation.y += 0.002; // Slow rotation
            renderer.render(scene, camera);
        }

        animate();
    }
});
