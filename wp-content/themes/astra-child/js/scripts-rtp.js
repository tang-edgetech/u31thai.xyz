$(document).ready(function() {
    console.log('Mega888 RTP');
    
    $(window).on('scroll resize load', function () {
        animateBars();
    });

    // Initial check in case bars are already visible
    animateBars();

    function isElementInViewport(el) {
        const rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
        );
    }

    function animateBars() {
        $('.percent-bar').each(function () {
            const $this = $(this);
            if ($this.hasClass('animated')) return;

            if (isElementInViewport(this)) {
                const $inner = $this.find('.percent-bar-inner');
                const rate = parseFloat( $inner.attr('data-rate') );
                const $number = $this.find('.number-increment');
                $inner.animate({ width: rate + '%' }, 1500);
                
                $({ countNum: 0 }).animate({ countNum: rate }, {
                    duration: 1500,
                    easing: 'swing',
                    step: function () {
                        $number.text(this.countNum.toFixed(2));
                    },
                    complete: function () {
                        $number.text(rate.toFixed(2));
                    }
                });
                $this.find('label').addClass('text-white');
                $this.addClass('animated');
            }
        });
    }
});