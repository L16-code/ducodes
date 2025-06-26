<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/lyzo/default/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Mar 2025 10:47:56 GMT -->

<head>
    {{--
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}

    @include('home.homecss')
</head>

<body>

    <!-- Preloader -->
    {{-- @include('home.loader') --}}
    <!-- End Preloader -->

    <!-- Navbar -->
    @include('home.navbar')
    <!-- End Navbar -->

    <!-- Help -->
    @include('home.homeComponents.about.aboutHelp')
    <!-- End Help -->
    <div class="container">
        <h1>Interactive 3D Globe</h1>
        <div id="globe-container">
            <div class="globe-title">Digital Planet</div>
        </div>
    </div>
    <!-- Footer -->
    @include('home.footer')
    <!-- End Footer -->
    {{-- <div class="cursor">
        <div class="cursor__inner"></div>
    </div> --}}

    <!-- Essential JS -->
    @include('home.homejs')


</body>
<style>
    #globe-container {
        width: 100%;
        height: 80vh;
        background-color: #fffafa;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .globe-title {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: rgb(252, 0, 0);
        font-size: 2rem;
        pointer-events: none;
        z-index: 10;
        text-align: center;
        opacity: 0.8;
        transition: opacity 0.3s ease;
    }

    #globe-container:hover .globe-title {
        opacity: 0;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Scene setup
        const container = document.getElementById('globe-container');
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, container.offsetWidth / container.offsetHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
        renderer.setSize(container.offsetWidth, container.offsetHeight);
        renderer.setPixelRatio(window.devicePixelRatio);
        container.appendChild(renderer.domElement);

        // Particle settings
        const particles = 1500;
        const radius = 6; // Globe radius
        const positions = new Float32Array(particles * 3);
        const originalPositions = new Float32Array(particles * 3); // Store original positions
        const targetPositions = new Float32Array(particles * 3); // For scattered positions

        // Geometry and material for particles
        const geometry = new THREE.SphereGeometry(0.15, 16, 16);
        const material = new THREE.MeshStandardMaterial({
            color: 0x00ffff,
            emissive: 0x004d99,
            transparent: true,
            opacity: 0.9,
        });

        // Particle group
        const group = new THREE.Group();

        // Initialize particle positions
        for (let i = 0; i < particles; i++) {
            // Randomized spherical distribution
            const theta = Math.random() * Math.PI * 2;
            const phi = Math.acos(2 * Math.random() - 1);
            const r = radius;

            const x = r * Math.sin(phi) * Math.cos(theta);
            const y = r * Math.sin(phi) * Math.sin(theta);
            const z = r * Math.cos(phi);

            // Store original positions
            originalPositions[i * 3] = x;
            originalPositions[i * 3 + 1] = y;
            originalPositions[i * 3 + 2] = z;

            positions[i * 3] = x;
            positions[i * 3 + 1] = y;
            positions[i * 3 + 2] = z;

            // Create mesh for each particle
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

        // Scatter particles on hover
        container.addEventListener('mouseenter', () => {
            isHovered = true;

            // Generate target positions for scattering
            for (let i = 0; i < particles; i++) {
                const i3 = i * 3;

                // Randomized scattering distance (slight outward movement)
                const scatterFactor = 1.2 + Math.random() * 0.5; // Slight scattering (1.2x to 1.7x original distance)
                targetPositions[i3] = originalPositions[i3] * scatterFactor;
                targetPositions[i3 + 1] = originalPositions[i3 + 1] * scatterFactor;
                targetPositions[i3 + 2] = originalPositions[i3 + 2] * scatterFactor;
            }
        });

        // Reset particles on mouse leave
        container.addEventListener('mouseleave', () => {
            isHovered = false;
        });

        // Animation loop
        const animate = () => {
            requestAnimationFrame(animate);

            const speed = 0.02; // Slower transition speed

            for (let i = 0; i < particles; i++) {
                const i3 = i * 3;
                const sphere = group.children[i];

                // Move towards target positions smoothly
                if (isHovered) {
                    sphere.position.x += (targetPositions[i3] - sphere.position.x) * speed;
                    sphere.position.y += (targetPositions[i3 + 1] - sphere.position.y) * speed;
                    sphere.position.z += (targetPositions[i3 + 2] - sphere.position.z) * speed;
                } else {
                    // Return to original positions
                    sphere.position.x += (originalPositions[i3] - sphere.position.x) * speed;
                    sphere.position.y += (originalPositions[i3 + 1] - sphere.position.y) * speed;
                    sphere.position.z += (originalPositions[i3 + 2] - sphere.position.z) * speed;
                }
            }

            group.rotation.y += 0.002; // Rotate the globe slowly
            renderer.render(scene, camera);
        };

        animate();
    });
</script>




</html>