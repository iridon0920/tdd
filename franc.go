package money

type franc struct {
	amount int
}

func NewFranc(amount int) *franc {
	franc := new(franc)
	franc.amount = amount
	return franc
}

func (d *franc) times(multiplier int) *franc {
	return NewFranc(d.amount * multiplier)
}

func (d *franc) equals(franc *franc) bool {
	return d.amount == franc.amount
}
