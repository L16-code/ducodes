@extends('frontend.layouts.app')

@section('title', 'About DuCodes - Custom Software & AI Development Company')
@section('meta_description', 'Learn about DuCodes, a custom software development company building web platforms, mobile apps, and AI solutions for businesses in Jaipur and worldwide.')

@push('schema')
<script type="application/ld+json">{!! json_encode([
    App\Support\Seo::webPageSchema(
        'About DuCodes',
        'Learn about DuCodes, a custom software development company building web platforms, mobile apps, and AI solutions for businesses in Jaipur and worldwide.',
        url()->current()
    ),
    App\Support\Seo::breadcrumbSchema([
        'Home' => route('homepage'),
        'About Us' => url()->current(),
    ]),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

@section('content')
    @include('frontend.components.about.aboutHelp')

    <div class="cursor">
        <div class="cursor__inner"></div>
    </div>
@endsection

@push('scripts')
<script defer>
document.addEventListener('DOMContentLoaded', function () {
    var element = document.querySelector('.cursor');
    if (!element) {
        return;
    }

    let mouse = { x: 0, y: 0 };
    window.addEventListener('mousemove', ev => mouse = getMousePos(ev));
    const lerp = (a, b, n) => (1 - n) * a + n * b;
    const getMousePos = e => ({ x: e.clientX, y: e.clientY });

    class Cursor {
        constructor(el) {
            this.DOM = { el: el };
            this.DOM.el.style.opacity = 0;
            this.bounds = this.DOM.el.getBoundingClientRect();
            this.renderedStyles = {
                tx: { previous: 0, current: 0, amt: 0.2 },
                ty: { previous: 0, current: 0, amt: 0.2 },
                scale: { previous: 1, current: 1, amt: 0.2 },
                opacity: { previous: 1, current: 1, amt: 0.2 }
            };
            this.onMouseMoveEv = () => {
                this.renderedStyles.tx.previous = this.renderedStyles.tx.current = mouse.x - this.bounds.width / 2;
                this.renderedStyles.ty.previous = this.renderedStyles.ty.previous = mouse.y - this.bounds.height / 2;
                gsap.to(this.DOM.el, { duration: 0.9, ease: 'Power3.easeOut', opacity: 1 });
                requestAnimationFrame(() => this.render());
                window.removeEventListener('mousemove', this.onMouseMoveEv);
            };
            window.addEventListener('mousemove', this.onMouseMoveEv);
        }
        enter() {
            element.classList.add('cHover');
        }
        leave() {
            this.renderedStyles['scale'].current = 1;
            this.renderedStyles['opacity'].current = 1;
            element.classList.remove('cHover');
        }
        render() {
            this.renderedStyles['tx'].current = mouse.x - this.bounds.width / 2;
            this.renderedStyles['ty'].current = mouse.y - this.bounds.height / 2;
            for (const key in this.renderedStyles) {
                this.renderedStyles[key].previous = lerp(this.renderedStyles[key].previous, this.renderedStyles[key].current, this.renderedStyles[key].amt);
            }
            this.DOM.el.style.transform = `translateX(${(this.renderedStyles['tx'].previous)}px) translateY(${this.renderedStyles['ty'].previous}px) scale(${this.renderedStyles['scale'].previous})`;
            this.DOM.el.style.opacity = this.renderedStyles['opacity'].previous;
            requestAnimationFrame(() => this.render());
        }
    }

    const cursor = new Cursor(element);
    [...document.querySelectorAll('a,.btn')].forEach(link => {
        link.addEventListener('mouseenter', () => cursor.enter());
        link.addEventListener('mouseleave', () => cursor.leave());
    });
});
</script>
@endpush
