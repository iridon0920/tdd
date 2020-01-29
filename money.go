package money

type value struct {
	amount int
}

func (v *value) equals(value value) bool {
	return v.amount == value.amount
}

