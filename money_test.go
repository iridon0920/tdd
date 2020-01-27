package money

import (
	"testing"
)

func TestMultiplication(t *testing.T) {
	five := NewDoller(5)
	product := five.times(2)
	if (product.amount != 10) {
		t.Errorf("amount = %d, want 10", five.amount)
	}
	product = five.times(3)
	if (product.amount != 15) {
		t.Errorf("amount = %d, want 15", five.amount)
	}
}
