import {isRef, computed} from "vue";

export const useMonthlyPayment = (total, intrestedRate, duration) => {
    const monthlyPayment = computed(() => {
        const principle = isRef(total) ? total.value : total
        const monthlyInterest = (isRef(intrestedRate) ? intrestedRate.value : intrestedRate) / 100 / 12
        const numberOfPaymentsMonth = (isRef(duration) ? duration.value : duration) * 12

        return principle * monthlyInterest * (Math.pow(1 + monthlyInterest, numberOfPaymentsMonth) - 1)
    })

    const totalPaid = computed(() => {
        return (isRef(duration) ? duration.value : duration) * 12 * monthlyPayment.value
    })

    const totalInterest = computed(() => {
        return totalPaid.value - (isRef(total) ? total.value : total)
    })

    return {monthlyPayment, totalPaid, totalInterest}
}
