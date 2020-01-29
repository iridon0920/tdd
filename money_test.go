package money

import (
	"testing"
	"github.com/stretchr/testify/assert"
)

func TestMultiplication(t *testing.T) {
	five := NewDoller(5)
	assert.Equal(t, *five.times(2), *NewDoller(10))
	assert.Equal(t, *five.times(3), *NewDoller(15))
}

func TestEquality(t *testing.T) {
	assert.True(t, NewDoller(5).equals(NewDoller(5)))
	assert.False(t, NewDoller(5).equals(NewDoller(6)))
}

func TestFrancMultiplication(t *testing.T) {
	five := NewFranc(5)
	assert.Equal(t, *five.times(2), *NewFranc(10))
	assert.Equal(t, *five.times(3), *NewFranc(15))
}
