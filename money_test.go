package money

import (
	"testing"
	"github.com/stretchr/testify/assert"
)

func TestMultiplication(t *testing.T) {
	five := NewDoller(5)
	assert.Equal(t, five.times(2), NewDoller(10).value)
	assert.Equal(t, five.times(3), NewDoller(15).value)
}

func TestEquality(t *testing.T) {
	assert.True(t, NewDoller(5).value.equals(NewDoller(5).value))
	assert.False(t, NewDoller(5).value.equals(NewDoller(6).value))
	assert.True(t, NewFranc(5).value.equals(NewFranc(5).value))
	assert.False(t, NewFranc(5).value.equals(NewFranc(6).value))
}

func TestFrancMultiplication(t *testing.T) {
	five := NewFranc(5)
	assert.Equal(t, five.times(2), NewFranc(10).value)
	assert.Equal(t, five.times(3), NewFranc(15).value)
}
