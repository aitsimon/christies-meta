<!-- --><?php
//            if(isset($_SESSION['objects-to-show'])){
//                foreach ($_SESSION['objects-to-show'] as $object){
//                    echo '<div class="accordion-item">';
//                        echo '<h2 class="accordion-header col-12 w-100" id="heading'.$object->getObjectId().'">';
//                            echo '<button class="btn collapsed col-12 py-5 d-flex flex-row justify-content-center align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$object->getObjectId().'" >';
//                                echo '<div class="priceName d-flex flex-column col-4 justify-content-start align-items-center">';
//                                    echo '<h4 class="col-6">'.$object->getName().'</h4>';
//                                    echo '<a class="btn price-tag col-6 my-3">'.$object->getPrice().'₣</a>';
//                                 echo '</div>';
//                                 echo '<div class="imageProduct d-flex justify-content-center align-items-center col-8">';
//                                        echo '<div class="carousel js-flickity w-100" > ';
//                                            echo '<div class="carousel-cell" >';
//                                                echo '<img src="'.$object->getImg1().'" />';
//                                            echo '</div>';
//                                            if($object->getImg2()!=null && $object->getImg2()!=''){
//                                                echo '<div class="carousel-cell" >';
//                                                    echo '<img src="'.$object->getImg2().'" />';
//                                                echo '</div>';
//                                            }
//                                            if($object->getImg3()!=null && $object->getImg3()!=''){
//                                                echo '<div class="carousel-cell" >';
//                                                    echo '<img src="'.$object->getImg3().'" />';
//                                                echo '</div>';
//                                            }
//                                        echo '</div>';
//                                 echo '</div>';
//                            echo '</button>';
//                        echo '</h2>';
//                        echo '<div id="collapse'.$object->getObjectId().'" class="accordion-collapse collapse" aria-labelledby="heading'.$object->getObjectId().'" data-bs-parent="#accordionObjects">';
//                            echo '<div class="accordion-body d-flex justify-content-center align-content-center">';
//                                echo '<a href="./index.php/list/'.$object->getObjectId().'" class="btn price-label text-white mb-4">View Product <i class="fas fa-object-group"></i></a>';
//                            echo '</div>';
//                        echo '</div>';
//                    echo'</div>';
//                }
//            }
//            else{
//                echo '<script src="view/front/front-scripts/generateItemsFromSession.js"></script>';
//            }
//            ?>

