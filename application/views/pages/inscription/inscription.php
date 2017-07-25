<form id="form-validation" name="form-validation" method="POST">
                            <div class="form-group">
                                <label class="form-label" for="validation-username">Nom</label>
                                <input id="validation-username"
                                       class="form-control"
                                       name="validation[username]"
                                       type="text" data-validation="[L>=6, L<=18, MIXED]"
                                       data-validation-message="$ must be between 6 and 18 characters. No special characters allowed."
                                       data-validation-regex="/^((?!admin).)*$/i"
                                       data-validation-regex-message="The word &quot;Admin&quot; is not allowed in the $">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="validation-password">Password</label>
                                <input id="validation-password"
                                       class="form-control"
                                       name="validation[password]"
                                       type="password" data-validation="[L>=6]"
                                       data-validation-message="$ must be at least 6 characters">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="validation-password-confirm">Confirm Password</label>
                                <input id="validation-password-confirm"
                                       class="form-control"
                                       name="validation[password-confirm]"
                                       type="password" data-validation="[V==validation[password]]"
                                       data-validation-message="$ does not match the password">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="validation-email">Email</label>
                                <input id="validation-email"
                                       class="form-control"
                                       name="validation[email]"
                                       type="text"
                                       data-validation="[EMAIL]">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="validation-email-confirm">Confirm Email</label>
                                <input id="validation-email-confirm"
                                       class="form-control"
                                       name="validation[email-confirm]"
                                       type="text"
                                       data-validation="[V==validation[email]]"
                                       data-validation-message="$ does not match the email">
                            </div>
                                     <div class="form-group">
                                <label class="form-label">Select</label>
                                <select name="validation-simple[type]"
                                       class="form-control"
                                       data-validation="[NOTEMPTY]">
                                    <option value="">Select type</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                            </div>


                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary width-150">Validate</button>
                                <button type="button" class="btn btn-default" onclick="$('#form-validation').removeError();">Clear</button>
                            </div>
                        </form>
