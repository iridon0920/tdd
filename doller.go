package money

type doller struct {
	amount int
}

func NewDoller(amount int) *doller {
	doller := new(doller)
	doller.amount = amount
	return doller
}

func (d *doller) times(multiplier int) *doller {
	return NewDoller(d.amount * multiplier)
}

func (d *doller) equals(doller *doller) bool {
	return d.amount == doller.amount
}
