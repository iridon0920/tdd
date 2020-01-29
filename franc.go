package money

type franc struct {
	value
}

func NewFranc(amount int) *franc {
	franc := new(franc)
	franc.amount = amount
	return franc
}

func (f *franc) times(multiplier int) value {
	return NewFranc(f.amount * multiplier).value
}
