package money

type doller struct {
	value
}

func NewDoller(amount int) *doller {
	doller := new(doller)
	doller.amount = amount
	return doller
}

func (d *doller) times(multiplier int) value {
	return NewDoller(d.amount * multiplier).value
}
