import React, { useEffect } from 'react'
import PropTypes from 'prop-types'
import {useDispatch} from 'react-redux'
import {deleteItem , updateItem} from '../Redux/shopping-cart/cartitemSlide'
import { useState } from 'react'
import { useSelector } from 'react-redux'
import numberWithCommas from '../utils/numberWithCommas'


const CartItem = props => {

  let cartItem = props.cartItem
      
  console.log(cartItem)
  
  const dispatch = useDispatch()

  const removeItem = () => {
      dispatch(deleteItem(cartItem))
  }

  const [quantity , setQuantity] = useState (props.cartItem.quantity)

  const changeQuantity = (type) => {
      
      
      if(type === "PLUS"){
          dispatch(updateItem({...cartItem, quantity: quantity + 1}))
      }else {
         dispatch(updateItem({...cartItem, quantity: quantity - 1 === 0 ? 1 : quantity - 1 }))
      }
  }

  useEffect(() => {
   setQuantity(props.cartItem.quantity)
  } , [cartItem.quantity])
  
  return (
      <div className="cart__item">
          <div className="cart__item__wrapper">

           <div className="cart__item__img">
                <img src= {cartItem.image} alt="" />
           </div>

           <div className="cart__item__content">
               <div className="cart__item__content__top">
                  {cartItem.name}
                  <span onClick={removeItem}  >
                        <img src= {require("../assets/Img/deletecart.png")} alt="" />
                  </span>
               </div>

               <div className="cart__item__content__midle">
                   <div className="cart__item__content__midle__item">
                      
                          <strong>{cartItem.rate}</strong>
                          <div className="cart__item__content__midle__item__img">
                                <img src= {require("../assets/Img/start.png")} alt="" />
                          </div>
                     
                       
                   </div>

                   <div className="cart__item__content__midle__item">
                       Kích cỡ : <strong>L</strong>
                   </div>
               </div>

               <div className="cart__item__content__bottom">
                       <div className="cart__item__content__bottom__item">
                          Số lượng 
                          <div className="cart__item__content__bottom__item__quantity">
                              <span  onClick={() =>  changeQuantity("MINUS")} className="cart__item__content__bottom__item__quantity__minus">
                                         <i class='bx bx-minus'></i>
                              </span>

                               <span className="cart__item__content__bottom__item__quantity__input"   >
                                          {
                                            quantity
                                          }
                               </span>

                              <span onClick={() =>  changeQuantity("PLUS")}   className="cart__item__content__bottom__item__quantity__plus">
                                   <i class='bx bx-plus'></i>
                              </span>
                          </div>
                       </div>

                       <div className="cart__item__content__bottom__item">
                           <strong>{numberWithCommas(cartItem.price)} VNĐ</strong>
                      </div> 
             </div>
           </div>
          </div>
      </div>
  )
}

CartItem.propTypes = {}

export default CartItem