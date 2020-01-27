package money

type doller struct {
	amount int
}

func NewDoller(amount int) *doller {
	doller := new(doller)
	doller.amount = amount
	return doller
}

func (doller *doller) times(multiplier int) *doller {
	return NewDoller(doller.amount * multiplier)
}
