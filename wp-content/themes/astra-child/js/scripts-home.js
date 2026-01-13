$(document).ready(function() {
    // if( gameProviders ) {
        
    //     console.log(typeof gameProviders);
    //     Object.entries(gameProviders).forEach(([categoryKey, categoryData]) => {
    //         console.log("Category:", categoryKey);
    //         console.log("Category Title:", categoryData.title);

    //         const games = Array.isArray(categoryData.games) 
    //         ? categoryData.games 
    //         : Object.values(categoryData.games);

    //         games.forEach(game => {
    //             console.log(game.title, game.thumbnail);
    //         });

    //     });

    // }
    
	$(document).on('click', '.provider-list .btn-section-bg', function(e) {
		var $this = $(this),
            $target = $this.attr('data-target');
        
		$('.provider-list .btn-section-bg').removeClass('active');
		$this.addClass('active');
		if( $this.hasClass('row-second') ) {
			$('.provider-list .btn-section-bg.row-second .check-active').removeClass('d-none');
			$('.provider-list .btn-section-bg.row-first .check-active').addClass('d-none');
		}
		else {
			$('.provider-list .btn-section-bg.row-second .check-active').addClass('d-none');
			$('.provider-list .btn-section-bg.row-first .check-active').removeClass('d-none');
		}

        const targetProvider = gameProviders[$target];
        var $html = '';
        if( targetProvider ) {
            const games = targetProvider.games;
            for (const [key, game] of Object.entries(games)) {
                $html += `
                <div class="col-2 mt-2 px-2">
                    <a href="javascript:void(0)">
                        <img src="${game.thumbnail}" alt="${game.title}" class="w-100 rounded">
                    </strong></a>
                </div>
                `;
            };
            $('#game_tab').html($html);
        }
        else {
            console.warn('There is no '+$target+' found!');
        }
	});
});