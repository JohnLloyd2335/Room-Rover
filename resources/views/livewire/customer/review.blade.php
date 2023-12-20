<div class="rd-reviews">
    <h4>Reviews</h4>
    @forelse ($ratings as $rating)
        <div class="review-item">
            <div class="ri-pic">
                <img src="https://st3.depositphotos.com/6672868/13701/v/450/depositphotos_137014128-stock-illustration-user-profile-icon.jpg"
                    alt="">
            </div>
            <div class="ri-text">
                <span>{{ $rating->rating_date }}</span>
                <div class="rating">
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < $rating->rating)
                            <i class="fas fa-star text-warning"></i>
                        @else
                            <i class="fas fa-star text-secondary"></i>
                        @endif
                    @endfor

                </div>
                <h5>{{ $rating->user->name }}</h5>
                <p>{{ $rating->comment ?? 'Rating without comments' }}</p>
            </div>
        </div>
    @empty
        <h4 class="text-center">No Reviews Yet</h4>
    @endforelse

    <div class="d-flex align-items-center justify-content-center">
        {{ $ratings->links() }}
    </div>
</div>
