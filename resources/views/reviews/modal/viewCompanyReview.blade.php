<div class="candidate_leave_review text-center">
    <div class="detials">
        <form id="review-form" class="ulockd-mrgn630 editRating" action="" method="post">
            <input type="hidden" name="id" value="{{ $review->id }}">
            <div class="star-rating">
                <input type="radio" name="rating" id="Overall_5" value="5" class="radio" {{ ($review->rating == 5) ? 'checked' : '' }}>
                <label for="Overall_5"></label>
                <input type="radio" name="rating" id="Overall_4" value="4" class="radio" {{ ($review->rating == 4) ? 'checked' : '' }}>
                <label for="Overall_4"></label>
                <input type="radio" name="rating" id="Overall_3" value="3" class="radio" {{ ($review->rating == 3) ? 'checked' : '' }}>
                <label for="Overall_3"></label>
                <input type="radio" name="rating" id="Overall_2" value="2" class="radio" {{ ($review->rating == 2) ? 'checked' : '' }}>
                <label for="Overall_2"></label>
                <input type="radio" name="rating" id="Overall_1" value="1" class="radio" {{ ($review->rating == 1)  ? 'checked' : ''}} readonly>
                <label for="Overall_1"></label>
            </div>
            <div class="form-group text-left">
                <label class="title">Review Title</label>
                <input class="form-control" type="text" name="review_title" value="{{ $review->review_title }}" required>
            </div>
            <div class="form-group text-left">
                <label class="control-label title">Review Content</label>
                <textarea class="form-control" rows="5" name="review_content" required>{{ $review->review_content }}</textarea>
            </div>
        </form>
    </div>
</div>
