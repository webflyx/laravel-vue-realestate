import { computed, isRef } from 'vue'

export const useMonthlyPayment = (total, interestRate, duration) => {

  const interestRateVal = computed(() => isRef(interestRate) ? interestRate.value : interestRate)
  const durationVal = computed(() => isRef(duration) ? duration.value : duration)

  const monthlyPayment = computed(() => {
    const principle = total
    const monthlyInterest = interestRateVal.value / 100 / 12
    const numberOfPaymentMonths = durationVal.value * 12
    return principle * monthlyInterest * (Math.pow(1 + monthlyInterest, numberOfPaymentMonths)) / (Math.pow(1 + monthlyInterest, numberOfPaymentMonths) - 1)
  })

  const totalPaid = computed(() => {
    return durationVal.value * 12 * monthlyPayment.value
  })

  const totalInterest = computed(() => {
    return totalPaid.value - total
  })

  return {monthlyPayment, totalPaid, totalInterest}
}